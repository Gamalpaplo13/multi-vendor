<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $address = UserAddress::where('user_id', Auth::user()->id)->get();
        return view('frontend.dashboard.address.index', compact('address'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.dashboard.address.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'email' => ['required', 'email', 'max:100'],
            'phone' => ['required', 'max:50'],
            'city' => ['required', 'max:50'],
            'countery' => ['required', 'max:50'],
            'state' => ['required', 'max:200'],
            'zip' => ['required', 'max:200'],
            'address' => ['required', 'max:200'],
        ]);

        $userAddress = new UserAddress();

        $userAddress->user_id = Auth::user()->id;
        $userAddress->name = $request->name;
        $userAddress->email = $request->email;
        $userAddress->phone = $request->phone;
        $userAddress->countery = $request->countery;
        $userAddress->city = $request->city;
        $userAddress->state = $request->state;
        $userAddress->zip = $request->zip;
        $userAddress->address = $request->address;

        $userAddress->save();

        toastr('Created Successfully!', 'success', 'success');

        return redirect()->route('user.address.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $address = UserAddress::findOrFail($id);
        return view('frontend.dashboard.address.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'email' => ['required', 'email', 'max:100'],
            'phone' => ['required', 'max:50'],
            'city' => ['required', 'max:50'],
            'countery' => ['required', 'max:50'],
            'state' => ['required', 'max:200'],
            'zip' => ['required', 'max:200'],
            'address' => ['required', 'max:200'],
        ]);

        $userAddress = UserAddress::findOrFail($id);

        $userAddress->user_id = Auth::user()->id;
        $userAddress->name = $request->name;
        $userAddress->email = $request->email;
        $userAddress->phone = $request->phone;
        $userAddress->countery = $request->countery;
        $userAddress->city = $request->city;
        $userAddress->state = $request->state;
        $userAddress->zip = $request->zip;
        $userAddress->address = $request->address;

        $userAddress->save();

        toastr('Updated Successfully!', 'success', 'success');

        return redirect()->route('user.address.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $address = UserAddress::findOrFail($id);
        $address->delete();

        return response(['status'=>'success','message'=>'deleted successfully!']);
    }
}
