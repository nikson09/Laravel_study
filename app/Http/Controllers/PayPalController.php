<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Product;
use App\Traits\Cart;

class PayPalController extends Controller
{
    use Cart;
      public function payment()
        {

            $products_cart = session()->get('products_cart');
            $ids = array_keys($products_cart);
            $products = Product::whereIn('id', $ids)->orderBy('id', 'asc')->get();

            $total = 0;

            foreach($products as $id => $cart)
            {
$data['items'][] =
[
        'name' => $cart['name_site'],
        'price' => intval($cart['price']/26.74),
        'qty' => $products_cart[$cart['id']]
] ;
}


            $data['invoice_id'] = 1;
            $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
            $data['return_url'] = route('payment.success');
            $data['cancel_url'] = route('payment.cancel');

            $total = 0;
            foreach($data['items'] as $item) {
                $total += $item['price']*$item['qty'];
            }



            $data['total'] = $total;

            $provider = new ExpressCheckout;

            $response = $provider->setExpressCheckout($data);

            $response = $provider->setExpressCheckout($data, true);
            $link = $response['paypal_link'];

            return redirect($link);
        }

        public function cancel()
        {
            dd('Sorry you payment is canceled');
        }

        public function success(Request $request)
        {
            $provider = new ExpressCheckout;
            $response = $provider->getExpressCheckoutDetails($request->token);

            if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
                        session()->forget('products_cart');

             
                         return redirect(route('main'));
            }

            dd('Something is wrong.');
        }

}
