<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
    function index()
    {
        $flashSale = FlashSale::first();
        $flashSaleItems = FlashSaleItem::where('status', 1)->where('show_at_home', 1)->orderBy('id', 'ASC')->paginate(20);
        return view('frontend.pages.flash-sale', compact('flashSale', 'flashSaleItems'));
    }
}
