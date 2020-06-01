<?php

namespace App\Http\Controllers;

use App\Traits\Cart;
use Illuminate\Http\Request;
use App\Category;

class HomeController extends Controller
{

    use Cart;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Category::all();

        $count = Cart::count_items();
        $total = Cart::price_items();

        return view('home',compact(['category','count','total']));
    }
}
