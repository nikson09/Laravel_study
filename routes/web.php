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

Route::get('/add_product/{id}', 'CartController@addProduct')->name('addProduct')->where('id', '[0-9]+');

Route::get('/categories/{id}', 'CategoryController@index')->name('category')->where('id', '[0-9]+');

Route::get('/product/{id}', 'ProductController@index')->name('product')->where('id', '[0-9]+');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
