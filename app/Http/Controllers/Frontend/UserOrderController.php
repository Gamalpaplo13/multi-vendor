<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\UserOrderDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    function index(UserOrderDataTable $datatable)
    {
        return $datatable->render('frontend.dashboard.order.index');
    }
}
