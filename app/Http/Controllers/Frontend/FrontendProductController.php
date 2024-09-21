<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendProductController extends Controller
{
    public function showProduct(string $slug)
    {
        $product = Product::with(['category','productImageGalleries','variants','brand'])->where('slug',$slug)->where('status',1)->first();
        return view('frontend.pages.product-detail',compact('product'));
    }

    function productsIndex(Request $request)
    {
        if($request->has('category')){
            $category = Category::where('slug',$request->category)->first();
            $products = Product::where([
                'category_id'=>$category->id,
                'status' => 1,
                'is_approved'=> 1,
            ])
            ->when($request->has('range'), function($query) use ($request){
                $price = explode(';',$request->range);
                $from = $price[0];
                $to = $price[1];

                return $query->where('price','>=',$from)->where('price','<=',$to);
            })
            ->paginate(12);
        }else if($request->has('search')){
            $products = Product::where(['status' => 1, 'is_approved'=> 1])->where(function($query) use ($request){
                $query->where('name', 'like', '%'.$request->search.'%')
                    ->orWhere('long_description',  'like', '%'.$request->search.'%')
                    ->orWhereHas('category',function($query) use ($request){
                        $query->where('name', 'like', '%'.$request->search.'%')
                        ->orWhere('long_description',  'like', '%'.$request->search.'%');
                    });
            })
            ->paginate(12);
        }else {
            $products = Product::where(['status' => 1, 'is_approved'=> 1])->orderBy('id','desc')->paginate(12);
        }
        $categories = Category::where('status',1)->get();
        return view('frontend.pages.product',compact('products','categories'));
    }
    function changeListView(Request $request)
    {
        Session::put('product_list_style', $request->style);
    }
}
