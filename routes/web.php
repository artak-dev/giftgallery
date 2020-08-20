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

Route::get('/', 'ProductsController@home')->name('homePage');

Route::get('/details/{id}', 'ProductsController@details')->name('details');

Route::get('/shop', 'ProductsController@shop')->name('shop');

Route::get('/sale', 'ProductsController@sale')->name('sale');

Route::post('/loadMore', 'AjaxController@loadMore')->name('loadMore');

Route::get('/giftset','ProductsController@giftset')->name('giftset');

Route::get('/view/cart','CartController@viewCart')->name('viewCart');

Route::post('/getCartItems','CartController@getAllProductsOnCart')->name('getCartItems');

Route::post('/getProductById','AjaxController@getProductAllImages');

Route::post('/productsFilter','AjaxController@productsFilter');

Route::post('/createOrder','OrdersController@createOrder')->name('createOrder');

Route::get('/checkout','ProductsController@checkout')->name('checkout');

Route::get('/mens','ProductsController@mens')->name('mens');

Route::post('/saleFilter','AjaxController@saleFilter')->name('saleFilter');

Route::post('/mens','AjaxController@saleFilter')->name('saleFilter');

Route::get('/womans','ProductsController@womans')->name('womans');

Route::get('/office','ProductsController@office')->name('office');

Route::get('/animals','ProductsController@giftsForAnimals')->name('animals');

Route::get('/childrens','ProductsController@giftsForChildrens')->name('childrens');



// Admin Routes

Route::get('/admin/login','AdminController@login');

Route::get('/admin/home','AdminController@home')->name('adminHome');

Route::post('/admin/createPost','AdminController@createPost')->name('adminCreatePost');

Route::post('adminLogin','AdminController@adminLogin')->name('adminLogin');

Route::post('changeOrderStatus','AdminController@changeOrderStatus')->name('changeOrderStatus');

Route::post('showAllNewOrders','AdminController@showAllNewOrders')->name('showAllNewOrders');

Route::post('showAllreadyToShippOrders','AdminController@showAllreadyToShippOrders')->name('showAllreadyToShippOrders');




