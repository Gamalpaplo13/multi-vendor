<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductVariantItem;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function cart()
    {
        $cartItems = Cart::content();

        if (count($cartItems) == 0) {
            Session::forget('coupon');
            // toastr('Cart is empty', 'warrning', 'warning'); (message, type ,header message)
            return redirect()->route('home');
        }
        return view('frontend.pages.cart', compact('cartItems'));
    }


    // Add item to cart
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        //check product quantity in database
        if ($product->quantity == 0) {
            return response(['status' => 'stock_out', 'message' => 'product stouct out']);
        } else if ($product->quantity < $request->qty) {
            return response(['status' => 'stock_out', 'message' => 'Qunatity not avaialable']);
        }


        $variants = [];
        $variantTotalAmount = 0;

        if ($request->has('variants_items')) {
            foreach ($request->variants_items as $item_id) {
                $variantItem = ProductVariantItem::find($item_id);
                $variants[$variantItem->productVariant->name]['name'] = $variantItem->name;
                $variants[$variantItem->productVariant->name]['price'] = $variantItem->price;
                $variantTotalAmount += $variantItem->price;
            }
        }

        // check Discount
        $productPrice = 0;
        if (checkDiscount($product)) {
            $productPrice += $product->offer_price;
        } else {
            $productPrice += $product->price;
        }

        // $cartData = [];
        // $cartData['id'] = $product->id;
        // $cartData['name'] = $product->name;
        // $cartData['price'] = $productPrice;
        // $cartData['weight'] = 10;
        // $cartData['options']['variants'] = $variants;
        // $cartData['options']['variants_total'] = $variantTotalAmount;
        // $cartData['options']['image'] = $product->thumb_image;
        // $cartData['options']['slug'] = $product->slug;

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' =>  $productPrice,
            'weight' => 10,
            'options' => [
                'variants' => $variants,
                'variants_total' => $variantTotalAmount,
                'image' => $product->thumb_image,
                'slug' => $product->slug
            ]
        ]);

        return response(['status' => 'success', 'message' => 'Added successfully!']);
    }



    public function updateProductQuantity(Request $request)
    {
        $productId = Cart::get($request->rowId)->id;
        $product = Product::findOrFail($productId);

        //check product quantity in database
        if ($product->quantity == 0) {
            return response(['status' => 'stock_out', 'message' => 'product stouct out']);
        } else if ($product->quantity < $request->qty) {
            return response(['status' => 'stock_out', 'message' => 'Qunatity not avaialable']);
        }

        Cart::update($request->rowId, $request->quantity);
        $productTotal = $this->getProductTotal($request->rowId);
        return response(['status' => 'success', 'message' => 'product quantity updated', 'product_total' => $productTotal]);
    }

    // get Product total price
    public function getProductTotal($rowId)
    {
        $product = Cart::get($rowId);
        $total = ($product->price + $product->options->variants_total) * $product->qty;

        return $total;
    }

    //get cart total amount
    public function cartTotal()
    {
        $total = 0;
        foreach (Cart::content() as $product) {
            $total += $this->getProductTotal($product->rowId);
        }
        return $total;
    }

    public function clearCart()
    {
        Cart::destroy();

        return response(['status' => 'success', 'message' => 'Cart Cleared']);
    }

    //remove product form cart
    public function removeProduct($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }
    public function getCartCount()
    {
        return Cart::content()->count();
    }
    public function getCartProducts()
    {
        return Cart::content();
    }
    public function removeSidebarProduct(Request $request)
    {
        Cart::remove($request->rowId);
        return response(['status' => 'success', 'message' => 'deleted']);
    }

    /**Apply Coupon */
    public function applyCoupon(Request $request)
    {
        if ($request->coupon_code == null) {
            return response(['status' => 'error', 'message' => 'coupon field is required']);
        }

        $coupon = Coupon::where(['code' => $request->coupon_code, 'status' => 1])->first();

        if ($coupon == null) {
            return response(['status' => 'error', 'message' => 'coupon is not exist']);
        } else if ($coupon->start_date > date('Y-m-d')) {
            return response(['status' => 'error', 'message' => 'coupon is not available yet!']);
        } else if ($coupon->end_date < date('Y-m-d')) {
            return response(['status' => 'error', 'message' => 'coupon is expired!']);
        } else if ($coupon->quantity  <= $coupon->total_used) {
            return response(['status' => 'error', 'message' => 'you can not apply this coupon!']);
        }

        if ($coupon->discount_type == 'amount') {
            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'coupon_code' => $coupon->code,
                'discount_type' => 'amount',
                'discount' => $coupon->discount
            ]);
        } elseif ($coupon->discount_type == 'percent') {
            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'coupon_code' => $coupon->code,
                'discount_type' => 'percent',
                'discount' => $coupon->discount
            ]);
        }

        return response(['status' => 'success', 'message' => 'coupon applied successfully!']);
    }

    /** Calculate coupon discount */
    public function couponCalculation()
    {
        if (Session::has('coupon')) {
            $coupon = Session::get('coupon');
            $subTotal = getCartTotal();
            if ($coupon['discount_type'] == 'amount') {
                $total = $subTotal - $coupon['discount'];
                return response(['status' => 'success', 'cart_total' => $total, 'discount' => $coupon['discount']]);
            } elseif ($coupon['discount_type'] == 'percent') {
                $discount = $subTotal - $subTotal * ($coupon['discount'] / 100);
                $discount = round($discount, 2);

                $total = $subTotal - $discount;
                $total = round($total, 2);
                return response(['status' => 'success', 'cart_total' => $total, 'discount' => $discount]);
            }
        } else {
            $total = getCartTotal();
            return response(['status' => 'success', 'cart_total' => $total, 'discount' => '0']);
        }
    }
}
