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

        Route::get('detail-cart','CartController@detailCart')->name('cart.detail-items');

        Route::put('delete-from-cart/{item}','CartController@deleteFromCart')->name('delete-from-cart');
    });
});

Route::group(['prefix'=>'messenger'],function (){
    Route::post('bot','BotController@processResponse')->name('bot.request');
    Route::get('defaut-card-option','BotController@loadDeaultCard')->name('bot.default-card');
    Route::post('process-bot','BotController@processRequest')->name('bot.webhook');
});

Route::get('/','HomeController@index')->name('home')->middleware('searching');

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
