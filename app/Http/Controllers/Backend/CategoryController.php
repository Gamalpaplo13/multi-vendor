<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use Str;

class CategoryController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => ['required', 'image', 'max:2000'],
            'name' => ['required', 'max:200', 'unique:categories,name'],
            'status' => ['required']
        ]);

        $category = new Category();

        $imagePath = $this->uploadImage($request, 'icon', 'uploads');

        $category->icon = $imagePath;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;

        $category->save();
        toastr('Category created successfully!', 'success');
        return redirect()->route('admin.category.index');
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
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => ['nullable', 'image', 'max:2000'],
            'name' => ['max:200'],
            'status' => ['required']
        ]);

        $category = Category::findOrFail($id);

        $image = $this->updateImage($request, 'icon', 'uploads');

        $category->icon = empty(!$image) ? $image : $category->icon;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;

        $category->save();
        toastr('Category Updated successfully!', 'success');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $subCategory = SubCategory::where('category_id', $category->id)->count();
        if ($subCategory > 0) {
            return response(['status' => 'error', 'message'=> 'This items contain sub items for delete this you have to delete the sub items first']); // iphone notes
        }

        $category->delete();
        return response(['status' => 'success', 'message'=>'Deleted Successfully!']);
    }


    function changeStauts(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->status = $request->status == 'true' ? 1 : 0;
        $category->save();

        return response(['message' => 'status has been updated'], 200);
    }
}
