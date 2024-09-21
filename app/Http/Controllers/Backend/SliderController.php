<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;


class SliderController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'banner' => ['required', 'image', 'max:2000'],
            'type' => ['max:200', 'string', 'min:5'],
            'title' => ['required', 'min:5', 'max:200'],
            'starting_price' => ['min:1', 'max:200'],
            'button_url' => ['url'],
            'serial' => ['required'],
            'status' => ['required']
        ]);
        $slider = new Slider();

        /**Handle file upload */
        $imagePath =  $this->uploadImage($request, 'banner', 'uploads');

        $slider->banner = $imagePath;
        $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->starting_price = $request->starting_price;
        $slider->button_url = $request->button_url;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
        $slider->save();

        toastr('Slider Created Successfully!', 'success');
        return redirect()->route('admin.slider.index');
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
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'banner' => ['nullable', 'image', 'max:2000'],
            'type' => ['max:200', 'string', 'min:5'],
            'title' => ['required', 'min:5', 'max:200'],
            'starting_price' => ['min:1', 'max:200'],
            'button_url' => ['url'],
            'serial' => ['required'],
            'status' => ['required']
        ]);
        $slider = Slider::findOrFail($id);

        /**Handle file upload */

        $image = $this->updateImage($request, 'banner', 'uploads', $slider->banner);

        $slider->banner = empty(!$image) ? $image : $slider->banner;
        $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->starting_price = $request->starting_price;
        $slider->button_url = $request->button_url;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
        $slider->save();

        toastr('Slider Updated Successfully!', 'success');
        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);
        $this->deleteImage($slider->banner);
        $slider->delete();

        return response(['status'=>'success','message'=>'deleted successfully!']);
    }
}
