<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    function index()
    {
        return view('frontend.dashboard.dashboard');
    }
}
