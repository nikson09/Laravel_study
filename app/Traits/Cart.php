<?php

namespace App\Traits;

use App\Product;

trait Cart
{
    public static function count_items()
    {
        if(session('products_cart'))
        {
            $count = 0;
            foreach(session('products_cart') as $id => $quantity)
            {
                $count = $count + $quantity;
            }
            return $count;
        }
            else
        {
            return 0;
        }

    }
    public static function price_items()
    {
            $products_cart = session()->get('products_cart');
            $ids = array_keys($products_cart);
            $products = Product::whereIn('id', $ids)->orderBy('id', 'asc')->get();

        if(session('products_cart'))
        {

            $total = 0;

            foreach($products as $id => $cart)
            {
                $total += $products_cart[$cart['id']] * $cart['price'];
            }
                return $total;
            }
                else
            {
                return 0;
            }

    }


}
