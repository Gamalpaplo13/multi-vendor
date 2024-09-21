<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\BrandDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Str;

class BrandController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(BrandDataTable $datatable)
    {
        return  $datatable->render('admin.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo' => ['required', 'image', 'max:2000'],
            'name' => ['required', 'string', 'max:100', 'unique:brands,name'],
            'is_featured' => ['required'],
            'status' => ['required']
        ]);

        $image = $this->uploadImage($request, 'logo', 'uploads');

        $brand = new Brand();

        $brand->logo = $image;
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;

        $brand->save();

        toastr('Brand Created Successfully!', 'success');

        return redirect()->route('admin.brand.index');
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
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'logo' => ['required', 'image', 'max:2000'],
            'name' => ['required', 'string', 'max:100', 'unique:brands,name'],
            'is_featured' => ['required'],
            'status' => ['required']
        ]);
        $brand = Brand::findOrFail($id);

        $image = $this->updateImage($request, 'logo', 'uploads',$brand->logo);

        $brand->logo = empty(!$image) ? $image : $brand->logo;
        $brand->name = $request->name;
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;

        $brand->save();

        toastr('Brand Updated Successfully!', 'success');

        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        $this->deleteImage($brand->logo);
        $brand->delete();

        return response(['status'=>'success','message'=>'Brand deleted successfully!'],200);
    }
    function changeStauts(Request $request)
    {
        $brand = Brand::findOrFail($request->id);
        $brand->status = $request->status == 'true' ? 1 : 0;
        $brand->save();

        return response(['message' => 'status has been updated'], 200);
    }
}
