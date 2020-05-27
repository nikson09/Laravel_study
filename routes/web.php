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

Route::get('/delete_product/{id}', 'CartController@deleteProduct')->name('deleteProduct')->where('id', '[0-9]+');

Route::post('/minus_product/{id}/', 'CartController@minusProduct')->name('minusProduct')->where('id', '[0-9]+');

Route::post('/plus_product/{id}/', 'CartController@plusProduct')->name('plusProduct')->where('id',  '[0-9]+');

Route::get('checkout', 'CartController@checkoutAction')->name('checkout');

Route::get('/categories/{id}', 'CategoryController@index')->name('category')->where('id', '[0-9]+');

Route::get('/product/{id}', 'ProductController@index')->name('product')->where('id', '[0-9]+');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
