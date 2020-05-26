<?php

namespace App\Http\Controllers;

use App\Traits\Cart;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    use Cart;

    public function index($ids)
    {
        $category = Category::all();

        $count = Cart::count_items();

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

}
