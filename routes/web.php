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

Route::group(['middleware'=>'auth'],function (){
    Route::group(['prefix'=>'cart'], function (){

        Route::put('product-add/{product}','CartController@addToCart')
            ->middleware('product.interaction')
            ->name('cart.add-cart');

        Route::put('product-remove/{product}','CartController@removeFromCart')
            ->name('cart.remove-cart');

        Route::get('detail-cart','CartController@detailCart')->name('cart.detail-items');

        Route::put('delete-from-cart/{item}','CartController@deleteFromCart')->name('delete-from-cart');

		Route::put('update-cart-quantity/{item?}','CartController@updateQuantity')->name('update-cart-quantity');

		Route::post('generate-order','CartController@generateOrder')->name('generate.order');

    });
});

Route::group(['prefix'=>'messenger'],function (){
    Route::get('bot','BotController@processResponse')->name('bot.request');
    Route::get('defaut-card-option','BotController@loadDeaultCard')->name('bot.default-card');
	Route::get('load-my-cart','BotController@loadMyCard')->name('bot.load-my-cart');
    Route::get('load-summary-information','BotController@loadSummaryInformation')->name('bot.load-summary-information');
	Route::get('sarch','BotController@search')->name('bot.search-products');
});

Route::get('/','HomeController@index')->name('home')->middleware('searching');

Route::get('/geolocation/{latitude}/{longitude}','BotController@location')->name('geo.location');

Route::group(['prefix'=>'product'],function (){
    Route::get('detail/{product}','ProductController@productDetail')
            ->middleware('product.interaction')
            ->name('product.detail');
});

Route::group(['prefix'=>'auth-user'],function (){
    Route::get('login','AuthenticateController@login')->name('auth.login');
});

Auth::routes();

Route::get('test','HomeController@test');
