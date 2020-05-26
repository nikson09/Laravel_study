<?php

namespace App\Http\Controllers;

use App\Traits\Cart;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
     use Cart;

     public function index()
     {
         $category = Category::all();

         $count = Cart::count_items();

         $total = self::price_items();



         $sliderProductes = Product::whereIn('is_recommended', [1])->orderBy('id', 'asc')->get();

         $latestProducts = Product::whereIn('is_new', [1])->orderBy('id', 'desc')->limit(6)->get();

         return view('main',compact(['category' ,'sliderProductes'  , 'latestProducts', 'count', 'total']));
     }

}
