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

Route::get('/', 'ProductPageController@index');

/*
|--------------------------------------------------------------------------
| Cart Routes
|--------------------------------------------------------------------------
*/
Route::get('/ajax/product-list', 'Ajax\ProductListAjaxController@getByDates');
Route::post('/ajax/cart/add-product', 'Ajax\CartAjaxController@addProduct');

/*
|--------------------------------------------------------------------------
| Checkout Routes
|--------------------------------------------------------------------------
*/
Route::get('/checkout', 'CheckoutPageController@index');
Route::get('/checkout/place-order', 'PlaceOrderController@index');
