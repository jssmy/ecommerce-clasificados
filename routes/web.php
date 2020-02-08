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

Route::get('/','ProductController@home')->name('home');

Route::group(['prefix'=>'product'],function (){
    Route::get('detail/{product}','ProductController@productDetail')->name('product.detail');
});

Route::group(['prefix'=>'auth'],function (){
    Route::get('login','AuthenticateController@login')->name('auth.login');
});



