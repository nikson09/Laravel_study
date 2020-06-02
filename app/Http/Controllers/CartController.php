<?php

namespace App\Http\Controllers;

use Laravel\Cashier\Cashier;
use App\User;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Traits\Cart;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    use Cart;

    public function addProduct($id, $qty)
    {
        Cart::add_to_cart($id, $qty);

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

        public function plusProduct($id)
        {
            $products_cart = session('products_cart');

            if(isset($products_cart[$id]))
            {
                $products_cart[$id] ++ ;

                session()->put('products_cart', $products_cart);

                return redirect()->back() ;
            }

        }

    public function checkoutAction()
    {
        $category = Category::all();

        $count = Cart::count_items();
        $total = Cart::price_items();
        //заполняем масив сессией
        $products_cart = session()->get('products_cart');
        //если есть товары в корзине
        if(isset($products_cart))
        {
        //получаем ключ масива в сессии
        $ids = array_keys($products_cart);
        //И ищем товары с таким же id в таблице и выводим его
        $products = Product::whereIn('id', $ids)->orderBy('id', 'asc')->get();
        }
        else
        {
        $products = null;
        }
        return view('checkout',compact(['category','count','products','total']));
    }
    public function stripe()
    {
            $category = Category::all();

            $count = Cart::count_items();
            $total = Cart::price_items();


        return view('stripe',compact(['category','count','total']));
    }

    public function payment()
    {
            $category = Category::all();

            $count = Cart::count_items();
            $total = Cart::price_items();


        return view('paypal',compact(['category','count','total']));
    }

    public function stripePay(Request $request)
    {
         $total = Cart::price_items();
         Stripe::setApiKey(env('STRIPE_SECRET'));

         $customer = Customer::create(array(
             'name' => $request->name,

             'phone' => $request->phone,
             'source'  => $request->stripeToken
         ));

         $charge = Charge::create(array(
             'customer' => $customer->id,
             'amount'   => $total*100,
             'currency' => 'uah' ,
             "metadata" => ['state' => $request->state,
                                         'city' => $request->city,
                                         'Description' => $request->comment]

         ));
        session()->forget('products_cart');


         return redirect(route('main'));
    }
}
