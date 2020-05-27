<?php

namespace App\Traits;

use App\Product;

trait Cart
{

    public static function add_to_cart($id,$qty)
    {
    //формируем масив сессии
        $session_cart = session()->get('products_cart');
    //формируем пустой масив
        $products_cart = array();
    //если в сессии уже существует товары,то заполняем пустой масив данными из сессии
        if(isset($session_cart))
        {
            $products_cart = $session_cart;
        }
    //проверяем по ключевым параметрам есть ли добавляемый товар в корзине(Первый параметр ключ,второй массив)
        if(array_key_exists($id,$products_cart))
        {
    //прибавляем товар к существующему
            $products_cart[$id]+=$qty;
        }
        else
        {
        //Или создаем новый товар
            $products_cart[$id]=$qty;
        }
        //Ложим внутрь сессии данные с масива
        session()->put('products_cart',$products_cart);

        return redirect()->back();

    }


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
        if(session('products_cart'))
        {
            $products_cart = session()->get('products_cart');
            $ids = array_keys($products_cart);
            $products = Product::whereIn('id', $ids)->orderBy('id', 'asc')->get();

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
