<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\FlashSaleItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\Product;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
    public function index(FlashSaleItemDataTable $datatable)
    {
        $flashSale = FlashSale::first();
        $products = Product::where('is_approved', 1)->where('status', 1)->orderBy('id', 'DESC')->get();
        return $datatable->render('admin.flash-sale.index', compact('flashSale', 'products'));
    }
    function update(Request $request)
    {
        $request->validate([
            'end_date' => ['required']
        ]);

        FlashSale::updateOrCreate(['id' => 1], ['end_date' => $request->end_date]);

        toastr('Updated Successfully!', 'success', 'success');

        return redirect()->back();
    }
    function addProduct(Request $request)
    {
        $request->validate([
            'product' => ['required', 'unique:flash_sale_items,product_id'],
            'show_at_home' => ['required'],
            'status' => ['required']
        ],[
            'product.unique' => 'The product is already in flash sale'
        ]);


        $flashSale = FlashSale::first();

        $flashSaleItem = new FlashSaleItem();
        $flashSaleItem->product_id = $request->product;
        $flashSaleItem->status = $request->status;
        $flashSaleItem->show_at_home = $request->show_at_home;
        $flashSaleItem->flash_sale_id = $flashSale->id;
        $flashSaleItem->save();

        toastr('Data Added Successfully', 'success', 'success');

        return redirect()->back();
    }
    public function destroy(Request $request)
    {
        $flashSale = FlashSaleItem::findOrFail($request->id);
        $flashSale->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
    public function changeShowAtHome(Request $request)
    {
        $flashSale = FlashSaleItem::findOrFail($request->id);
        $flashSale->show_at_home = $request->status == 'true' ? 1 : 0;
        $flashSale->save();

        return response(['message' => 'Show-At-Home has been updated'], 200);
    }
    public function changeStatus(Request $request)
    {
        $flashSale = FlashSaleItem::findOrFail($request->id);
        $flashSale->status = $request->status == 'true' ? 1 : 0;
        $flashSale->save();

        return response(['message' => 'Status has been updated'], 200);
    }
}
