<?php

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

Route::get('/', function () {
    return view('welcome');
});

//User Interface Routes
Route::get('/store/cart', 'StoreController@cart');
Route::get('/store', 'StoreController@index');
Route::get('/store/{id}', 'StoreController@show');
Route::get('/store/add-to-cart/{book}', 'StoreController@addToCart')->name('addToCart');
Route::get('/store/remove-from-cart/{book}', 'StoreController@removeFromCart')->name('removeFromCart');
Route::post('/store/order', 'StoreController@order')->name('order');
Route::get('/store/category/{category}', 'StoreController@selectCategory')->name('selectCategory');
Route::get('/store/book/{book}', 'StoreController@selectAuthor')->name('selectAuthor');

//Admin Route
Route::get('/admin/order/mark-delivered/{id}', 'OrderController@markDelivered')->name('markDelivered');
Route::get('/admin', function () {
    return view('admin/index');
});

//Category Routes
Route::resource('admin/category', 'CategoryController');

//Book Routes
Route::resource('admin/book', 'BookController');

//Order Routes
Route::resource('admin/order', 'OrderController');