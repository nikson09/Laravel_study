<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'MainController@index')->name('main');

Route::post('/add_product/{id}/{qty}', 'CartController@addProduct')
     ->name('addProduct')->where(['id' => '[0-9]+','qty' => '[0-9]+']);

Route::post('/delete_product/{id}', 'CartController@deleteProduct')->name('deleteProduct')->where('id', '[0-9]+');

Route::post('/minus_product/{id}/', 'CartController@minusProduct')->name('minusProduct')->where('id', '[0-9]+');

Route::post('/plus_product/{id}/', 'CartController@plusProduct')->name('plusProduct')->where('id',  '[0-9]+');

Route::get('checkout', 'CartController@checkoutAction')->name('checkout');
Route::get('checkout/stripe', 'CartController@stripe')->name('stripe');
Route::post('/stripe_pay', 'CartController@stripePay')->name('stripe_pay');

Route::get('checkout/payment', 'CartController@payment')->name('payment');
Route::get('payment', 'PayPalController@payment')->name('payment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');

Route::get('/categories/{id}', 'CategoryController@index')->name('category')->where('id', '[0-9]+');

Route::get('/product/{id}', 'ProductController@index')->name('product')->where('id', '[0-9]+');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
});
