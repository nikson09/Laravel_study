<?php

namespace App\Http\Controllers;

use App\Traits\Cart;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use Cart;
    public function index($product_id)
    {
        $category = Category::all();

        $count = self::count_items();

        $total = self::price_items();

        $products = Product::whereIn('id',[$product_id])->orderBy('id', 'asc')->get();

        return view('product',compact(['category','products','count','total' ]));
    }


}
