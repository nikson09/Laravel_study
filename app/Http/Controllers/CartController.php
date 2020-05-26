<?php

namespace App\Http\Controllers;

use App\Traits\Cart;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    use Cart;

    public function addProduct($id, $qty)
    {

        $session_cart = session()->get('products_cart');

        if(isset($session_cart))
        {
            $products_cart = $session_cart;
        }

        if(array_key_exists($id,$products_cart))
        {
            $products_cart[$id]+=$qty;
        }
        else
        {
            $products_cart[$id]=$qty;
        }

        session()->put('products_cart',$products_cart);

        return redirect()->back();
    }

    public function deleteProduct($id)
    {
        $products_cart = session('products_cart');

        unset($products_cart[$id]);

        session()->put('products_cart',$products_cart);

        return redirect()->back();
    }

    public function minusProduct($id)
    {
        $products_cart = session('products_cart');

        if(isset($products_cart[$id]))
        {
            $products_cart[$id] -- ;

            session()->put('products_cart', $products_cart);

            return redirect()->back() ;
        }

    }

    public function checkoutAction()
    {
        $category = Category::all();

        $count = Cart::count_items();
        $total = Cart::price_items();

        $products_cart = session()->get('products_cart');
        $ids = array_keys($products_cart);
        $products = Product::whereIn('id', $ids)->orderBy('id', 'asc')->get();



        return view('checkout',compact(['category','count','products','total']));
    }



}
