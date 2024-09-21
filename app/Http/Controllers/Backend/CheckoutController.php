<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShippingRule;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $userAddress = UserAddress::where('user_id', Auth::user()->id)->get();
        $shippingMethods = ShippingRule::where('status', 1)->get();
        return view('frontend.pages.checkout', compact('userAddress', 'shippingMethods'));
    }
    public function createAddress(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:50'],
            'phone' => ['required', 'max:50'],
            'email' => ['required', 'email'],
            'countery' => ['required', 'max:50'],
            'goverment' => ['required', 'max:50'],
            'city' => ['required', 'max:50'],
            'zip' => ['required', 'max:50'],
            'address' => ['required', 'max:200'],
        ]);

        $address = new UserAddress();

        $address->user_id = Auth::user()->id;
        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->email = $request->email;
        $address->countery = $request->countery;
        $address->state = $request->goverment;
        $address->city = $request->city;
        $address->zip = $request->zip;
        $address->address = $request->address;
        $address->save();

        toastr('Created Successfully!', 'success', 'Created');

        return redirect()->back();
    }

    function checkoutFormSubmit(Request $request)
    {
        $request->validate([
            'shipping_address_id' => ['required', 'integer'],
            'shipping_method_id' => ['required', 'integer']
        ]);

        
        $shippingMethod = ShippingRule::findOrFail($request->shipping_method_id);

        if($shippingMethod){
            Session::put('shipping_method', [
                'id' => $shippingMethod->id,
                'name' => $shippingMethod->name,
                'type' => $shippingMethod->type,
                'cost' => $shippingMethod->cost,
            ]);
        }

        $address = UserAddress::findOrFail($request->shipping_address_id)->toArray();

        if($address){
            Session::put('shipping_address', $address);
        }

        return response(['status'=>'success', 'redirect_url'=> route('user.payment')]);
    }
}
