<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    function index()
    {
        if (!Session::has('shipping_address')) {
            return redirect()->route('user.checkout');
        }
        return view('frontend.pages.payment');
    }

    function storeOrder($paymentMethod, $paymentStatus, $trasnactionId, $paidAmount, $paidCurrencyName)
    {
        $settings = GeneralSetting::first();
        $order = new Order();
        $order->invoice_id = rand(1, 999999) . "_" . rand(1, 8000);
        $order->user_id = Auth::user()->id;
        $order->sub_total = getCartTotal();
        $order->amount = getFinalTotalAmount();
        $order->currency_name = $settings->currency_name;
        $order->currency_icon = $settings->currency_icon;
        $order->product_quantity = \Cart::content()->count();
        $order->payment_method = $paymentMethod;
        $order->payment_status = $paymentStatus;
        $order->order_address = json_encode(Session::get('shipping_address'));
        $order->shipping_method = json_encode(Session::get('shipping_method'));
        $order->coupon = json_encode(Session::get('coupon')) ? json_encode(Session::get('coupon')) : '';
        $order->order_status = 'pending';
        $order->save();

        /** Store Order Products */
        foreach (\Cart::content() as $item) {
            $product = Product::find($item->id);
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $product->id;
            $orderProduct->product_name = $product->name;
            $orderProduct->variants = json_encode($item->options->variants);
            $orderProduct->variant_total = $item->options->variants_total;
            $orderProduct->unit_price = $item->price;
            $orderProduct->quantity = $item->qty;
            $orderProduct->save();

            // update product quantity
            $updatedQty = ($product->quantity - $item->qty);
            $product->quantity = $updatedQty;
            $product->save();
        }

        // store transaction details
        $transaction = new Transaction();
        $transaction->order_id = $order->id;
        $transaction->transaction_id = $trasnactionId;
        $transaction->payment_method = $paymentMethod;
        $transaction->amount = getFinalTotalAmount();
        $transaction->amount_real_currency = $paidAmount;
        $transaction->amount_real_currency_name = $paidCurrencyName;
        $transaction->save();
    }

    public function cashOnDelivery(Request $request)
    {
        $transcationId = uniqid();
        // $transcationId = \Str::random(15);
        $totalAmount = getFinalTotalAmount();
        $this->storeOrder('cash-on-delivery', 1 , $transcationId , $totalAmount, 'LE');

        $this->clearSession();
        
        return redirect()->route('frontend.pages.payment-success');
    }
}
