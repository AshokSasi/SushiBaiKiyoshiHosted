<?php

// Title:      routes/web.php
// Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
// Details:    This page is used as the router that manages all the routes, redirects, and get/post requests in the website
//             which is necessary for the website's navigation to function and allow users to access the various pages and view.

use App\Http\Controllers\PostsController;


Route::get('about', function () {
    return view('about');
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/menu/index', 'MenuItemsController@index')->name('menu');

Route::get('/cart/index', 'CartController@index')->name('cart');

Route::get('/user/index', 'UserController@index')->name('user');
Route::post('/user/edit/{id}', 'UserController@update');
Route::get('/user/orders', 'UserController@orders')->name('userOrders');
Route::get('/orders/index', 'OrdersController@index')->name('allOrders');

Route::get('/menu/create', 'MenuItemsController@showCreate');
Route::get('/menu/edit/{id}', 'MenuItemsController@showEdit');
Route::post('/menu/edit/{id}', 'MenuItemsController@update');
Route::post('/menu/discount/{id}', 'MenuItemsController@discount');

Route::get('/stock/index', 'StockController@index')->name('stock');
Route::get('/admin/index', 'AdminController@index')->name('admin');
Route::get('/stock/show', 'StockController@show');

Route::post('/menu', 'MenuItemsController@store');
Route::get('/menu/delete/{id}', 'MenuItemsController@destroy');

Route::get('/admin/show/{id}', 'AdminController@show');
Route::get('/admin/create', 'AdminController@create');
Route::post('/admin', 'AdminController@store');
Route::get('/admin/delete/{id}', 'AdminController@destroy');
Route::get('/admin/edit/{id}', 'AdminController@showEdit');
Route::post('/admin/update/{id}', 'AdminController@update');

Route::get('/stock/create', 'StockController@create');
Route::get('/stock/show/{id}', 'StockController@show');
Route::get('/stock/edit/{id}', 'StockController@edit');
Route::post('/stock/update/{id}', 'StockController@update');

Route::get('/cart/add/{id}', 'CartController@addToCart');
Route::get('/cart/destroy/{id}', 'CartController@destroy');

Route::post('/orders', 'OrdersController@store');
Route::post('/orders/update/{id}', 'OrdersController@update');
Route::post('/orders/filter', 'OrdersController@filter');
Route::get('/orders/show/{id}', 'OrdersController@show');


Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
