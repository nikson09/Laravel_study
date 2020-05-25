<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
     public function index()
     {
         $category = Category::all();

         $count = self::count_items();

         $total = self::price_items();

         $sliderProductes = Product::whereIn('is_recommended', [1])->orderBy('id', 'asc')->get();

         $latestProducts = Product::whereIn('is_new', [1])->orderBy('id', 'desc')->limit(6)->get();

         return view('main',compact(['category' ,'sliderProductes'  , 'latestProducts', 'count', 'total']));
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
