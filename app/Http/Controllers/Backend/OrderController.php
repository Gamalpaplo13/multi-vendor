<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CanceldOrderDataTable;
use App\DataTables\DeliverdOrderDataTable;
use App\DataTables\OrderDataTable;
use App\DataTables\PendingOrderDataTable;
use App\DataTables\ProcessedOrderDataTable;
use App\DataTables\ShippedOrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OrderDataTable $datatable)
    {
        return $datatable->render('admin.order.index');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.show',compact('order'));
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
        $order = Order::findOrFail($id);

        //delete order product
        $order->orderProducts()->delete();

        //delete order transaction
        $order->transaction()->delete();

        $order->delete();

        return response(['status'=>'success','message'=>'the order delted successfully!']);
    }
    public function changeOrderStatus(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $order->order_status =$request->status;
        $order->save();

        return response(['status'=>'success','message'=>'updated order status']);
    }
    public function changePaymentStatus(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $order->payment_status =$request->status;
        $order->save();

        return response(['status'=>'success','message'=>'updated payment status']);
    }

    public function pendingOrders(PendingOrderDataTable $datatable)
    {
        return $datatable->render('admin.order.pending-order');
    }
    public function processedOrders(ProcessedOrderDataTable $datatable)
    {
        return $datatable->render('admin.order.processed-order');
    }
    public function shippedOrders(ShippedOrderDataTable $datatable)
    {
        return $datatable->render('admin.order.shipped-order');
    }
    public function deliverdOrders(DeliverdOrderDataTable $datatable)
    {
        return $datatable->render('admin.order.deliverd-order');
    }
    public function canceldOrders(CanceldOrderDataTable $datatable)
    {
        return $datatable->render('admin.order.canceld-order');
    }
}
