<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addProduct($id, $qty)
    {
        $product = Product::find($id);
        $products_cart = session()->get('products_cart');

        if(!$products_cart)
        {
            $products_cart =
            [
                $id =>
                [
                    "id"    => $product -> id,
                    "discount"    => $product -> discount,
                    "name"     => $product -> name_site,
                    "quantity" => $qty,
                    "code" => $product -> code,
                    "price"    => $product -> price,
                    "last_price"    => $product -> last_price
                ]
            ];
            session()->put('products_cart',$products_cart);

            return redirect()->back();
        }
        if(isset($products_cart[$id]))
        {
            $products_cart[$id]['quantity'] += +$qty;

            session()->put('products_cart', $products_cart);

            return redirect()->back() ;
        }

        $products_cart[$id] =
        [
            'id'    => $product -> id,
            'discount'    => $product -> discount,
            'name'     => $product -> name_site,
            'quantity' => $qty,
            'code' => $product -> code,
            'price'    => $product -> price,
            'last_price' => $product -> last_price
        ];
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
            $products_cart[$id]['quantity']--;

            session()->put('products_cart', $products_cart);

            return redirect()->back() ;
        }

    }

    public function checkoutAction()
    {
        $category = Category::all();

        $count = self::count_items();
        $total = self::price_items();

        return view('checkout',compact(['category','total','count']));
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
        } else {
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
            } else {
                        return 0;
                    }

    }

}
