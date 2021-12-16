<?php
//  use App\Task;
use App\Http\Controllers\PostsController;


Route::get('about', function () {
    return view('about');
});
Route::get('/', function () {
    return view('welcome');
})->name('home');;

Route::get('/menu/index', 'MenuItemsController@index')->name('menu');
Route::get('/cart/index', 'CartController@index')->name('cart');
Route::get('/user/index', 'UserController@index');
Route::get('/user/orders', 'UserController@orders');
Route::get('/orders/index', 'OrdersController@index');
Route::get('/menu/create', 'MenuItemsController@showCreate');
Route::get('/menu/edit/{id}', 'MenuItemsController@showEdit');
Route::post('/menu/edit/{id}', 'MenuItemsController@update');
//Route::get('/menu/edit', 'MenuItemsController@showEdit');
Route::get('/stock/index', 'StockController@index');
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
Route::get('/stock/show/{id}', 'StockController@show');
Route::get('/cart/add/{id}', 'CartController@addToCart');
Route::get('/cart/destroy/{id}', 'CartController@destroy');

Route::post('/user', 'OrdersController@store');

Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');


Route::get('/login', 'SessionsController@create')->name('login');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');
