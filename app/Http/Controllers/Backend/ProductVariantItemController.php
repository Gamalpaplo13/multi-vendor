<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductVariantItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;

class ProductVariantItemController extends Controller
{
    public function index(ProductVariantItemDataTable $datatable, $productId, $variantId)
    {
        $product = Product::findOrFail($productId);
        $variant = ProductVariant::findOrFail($variantId);
        return $datatable->render('admin.product.product-variant-item.index', compact('product', 'variant'));
    }
    public function create(string $productId , string $variantId)
    {
        $product = Product::findOrFail($productId);
        $variant = ProductVariant::findOrFail($variantId);
        return view('admin.product.product-variant-item.create', compact('variant','product'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'variant_id' => ['required', 'integer'],
            'name' => ['required', 'max:200'],
            'price' => ['required', 'integer'],
            'is_default' => ['required'],
            'status' => ['required'],
        ]);

        $variantItem = new ProductVariantItem();
        $variantItem->product_variant_id = $request->variant_id;
        $variantItem->name = $request->name;
        $variantItem->price = $request->price;
        $variantItem->is_default = $request->is_default;
        $variantItem->status = $request->status;
        $variantItem->save();


        toastr('Data Created Successfully!','success','success');

        return redirect()->route('admin.product-variant-item.index' , ['productId' => $request->product_id , 'variantId' => $request->variant_id]);
    }
    public function edit(string $variantItemId)
    {
        $variantItem = ProductVariantItem::findOrFail($variantItemId);
        return view('admin.product.product-variant-item.edit',compact('variantItem'));
    }
    public function update(string $variantItemId , Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'price' => ['required', 'integer'],
            'is_default' => ['required'],
            'status' => ['required'],
        ]);

        $variantItem = ProductVariantItem::findOrFail($variantItemId);
        $variantItem->name = $request->name;
        $variantItem->price = $request->price;
        $variantItem->is_default = $request->is_default;
        $variantItem->status = $request->status;
        $variantItem->save();


        toastr('Data Updated Successfully!','success','success');

        return redirect()->route('admin.product-variant-item.index' , ['productId' => $variantItem->productVariant->product_id , 'variantId' => $variantItem->product_variant_id]);
    }
    public function destroy(string $variantId)
    {
        $variantItem = ProductVariantItem::findOrFail($variantId);
        $variantItem->delete();

        return response(['status'=>'success','message'=>'Data Deleted successfully!']);
    }
    function chanegStatus(Request $request)
    {
        $variantItem = ProductVariantItem::findOrFail($request->id);

        $variantItem->status = $request->status == 'true' ? 1 : 0;
        $variantItem->save();

        return response(['message' => 'status has been updated'], 200);
    }
}
