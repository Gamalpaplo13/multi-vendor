<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\TransactionDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrasnactionController extends Controller
{
    function index(TransactionDataTable $datatable)
    {
        return $datatable->render('admin.transaction.index');
    }
}
