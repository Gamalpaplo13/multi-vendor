<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductVariantDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,ProductVariantDataTable $datatable)
    {
        $product = Product::findOrFail($request->product);
        return $datatable->render('admin.product.product-variant.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.product-variant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product'=> ['integer','required'],
            'name'=> ['required','max:200'],
            'status'=> ['required']
        ]);

        $productVariant = new ProductVariant();

        $productVariant->product_id = $request->product;
        $productVariant->name = $request->name;
        $productVariant->status = $request->status;
        $productVariant->save();

        toastr('Variant Crated Successfully!','success','success');

        return redirect()->route('admin.product-variant.index' , ['product'=>$request->product]);
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
        $variant = ProductVariant::findOrFail($id);
      return view('admin.product.product-variant.edit',compact('variant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name'=> ['required','max:200'],
            'status'=> ['required']
        ]);
        $productVariant = ProductVariant::findOrFail($id);
        $productVariant->product_id = $request->product;
        $productVariant->name = $request->name;
        $productVariant->status = $request->status;
        $productVariant->save();

        toastr('Variant Updated Successfully!','success','success');

        return redirect()->route('admin.product.product-variant.index',['product'=>$productVariant->product_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $variant = ProductVariant::findOrFail($id);
        $variantItemCheck = ProductVariantItem::where('product_variant_id' , $variant->id)->count();
        if($variantItemCheck > 0){
            return response(['status'=>'error','message'=>'this variant contain items in it Delete the variant item first for delete this variant']);
        }
        $variant->delete();

        return response(['status'=>'success','message'=>'deleted successfully']);
    }
    function changeStauts(Request $request)
    {
        $product = ProductVariant::findOrFail($request->id);
        $product->status = $request->status == 'true' ? 1 : 0;
        $product->save();

        return response(['message' => 'status has been updated'], 200);
    }
}
