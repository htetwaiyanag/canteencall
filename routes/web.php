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

Route::get('/', 'HomeController@home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('menu', 'MenuController');

Route::resource('order', 'OrderController');

Route::get('/order/addCart/{id}','OrderController@addCart');

Route::get('/dashboard','DashboardController@dashboardIndex')->name('dashboard');

Route::get('/search/c','SearchController@searchCanteen');

Route::get('/search/f/{id}/{orderBy?}','SearchController@searchMenu');

Route::resource('/cart', 'CartController');

Route::post('/cart/remove/{id}','CartController@removeCartItem');

Route::get('/cart/view/{id}','CartController@viewIndex');

Route::get('/sale','SaleController@index')->name('sale');

Route::resource('/feedback','FeedbackController');

Route::resource('/user', 'UserController');

