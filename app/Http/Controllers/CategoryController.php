<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($ids)
    {
        $category = Category::all();

        $count = self::count_items();

        $total = self::price_items();

        $category_name = Category::whereIn('id',[$ids])->orderBy('id', 'asc')->get();

        $products = Product::whereIn('category_id',[$ids])->orderBy('id', 'desc')->paginate(9);

        return view('category',compact(
        [
            'category',
            'category_name' ,
            'products',
            'count',
            'total'
        ]));
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
