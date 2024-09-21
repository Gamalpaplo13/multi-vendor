<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminVendorProfileController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Vendor::where('user_id', Auth::user()->id)->first();
        return view('admin.vendor-profile.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'banner' => ['nullable', 'image', 'max:3000'],
            'phone' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:100'],
            'address' => ['required'],
            'description' => ['required'],
            'facebook_link' => ['nullable', 'url'],
            'instagram_link' => ['nullable', 'url'],
            'whatsapp_link' => ['nullable', 'url'],
            'x_link' => ['nullable', 'url']
        ]);

        $vendor = Vendor::where('user_id', Auth::user()->id)->first();
        $image = $this->updateImage($request, 'banner', 'uploads',$vendor->banner);

        $vendor->banner = empty(!$image) ? $image : $vendor->banner;
        $vendor->phone = $request->phone;
        $vendor->email = $request->email;
        $vendor->address = $request->address;
        $vendor->description = $request->description;
        $vendor->facebook_link = $request->facebook_link;
        $vendor->instagram_link = $request->instagram_link;
        $vendor->whatsapp_link = $request->whatsapp_link;
        $vendor->x_link = $request->x_link;
        $vendor->save();

        toastr('Vendor profile Updated successfully!','success');

        return redirect()->route('admin.vendor-profile.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
