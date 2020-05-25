<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($product_id)
    {
        $category = Category::all();

        $count = self::count_items();

        $total = self::price_items();

        $products = Product::whereIn('id',[$product_id])->orderBy('id', 'asc')->get();

        return view('product',compact(['category','products','count','total' ]));
    }

    public function count_items()
    {
        if(session('products_cart'))
        {
            $count = 0;
            foreach(session('products_cart') as $id => $cart)
            {
                $count = $count + $cart['quantity'];
            }
            return $count;
        }
            else
        {
            return 0;
        }
    }

    public function price_items()
    {
        if(session('products_cart'))
        {
            $total = 0;
            foreach(session('products_cart') as $id => $cart)
            {
                $total += $cart['quantity'] * $cart['price'];
            }
            return $total;
        }
            else
        {
            return 0;

        }

    }
}
