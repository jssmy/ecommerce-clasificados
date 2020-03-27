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

Route::group(['middleware'=>['auth']],function (){
    Route::group(['prefix'=>'cart'], function (){
        Route::put('product-add/{product}','CartController@addToCart')->name('cart.add-cart');
        Route::get('detail-cart','CartController@detailCart')->name('cart.detail-items');
        Route::put('delete-from-cart/{item}','CartController@deleteFromCart')->name('delete-from-cart');
    });
});

Route::get('/','ProductController@home')->name('home');

Route::group(['prefix'=>'product'],function (){
    Route::get('detail/{product}','ProductController@productDetail')->name('product.detail');
});

Route::group(['prefix'=>'auth'],function (){
    Route::get('login','AuthenticateController@login')->name('auth.login');
});

Route::group(['prefix'=>'messenger'],function (){
    Route::get('/','MessageController@index')->name('message.index');
});


Auth::routes();
