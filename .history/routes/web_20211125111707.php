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
Route::get('/cart/index', 'CartController@index');
Route::get('/user/index', 'UserController@index');
Route::get('/user/orders', 'UserController@orders');
Route::get('/orders/index', 'OrdersController@index');
Route::get('/menu/create', 'MenuItemsController@showCreate');
Route::get('/menu/edit/{id}', 'MenuItemsController@showEdit');
Route::post('/menu/edit/{id}', 'MenuItemsController@update');
Route::get('/menu/edit', 'MenuItemsController@showEdit');
Route::get('/stock/index', 'StockController@index');
Route::get('/admin/index', 'AdminController@index');
Route::get('/stock/show', 'StockController@show');
Route::post('/menu', 'MenuItemsController@store');
Route::get('/delete/{id}', 'MenuItemsController@destroy');
Route::get('/admin/show/{id}', 'AdminController@showEdit');
// Route::post('/menu/{menuItem}', 'MenuItemsController@destroy');
//Route::get('/','PostsController@index')->name('home');

// Route::get('/posts/create','PostsController@create');

// Route::post('/posts','PostsController@store');


// Route::get('/posts/{post}','PostsController@show');

// Route::post('/posts/{post}/comments','CommentsController@store');


// Route::get('/posts/tags/{tag}', 'TagsController@index');


Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');


Route::get('/login', 'SessionsController@create')->name('login');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');

//  Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/tasks','TasksController@index');

// Route::get('/tasks/{task}','TasksController@show');

// Route::get('/tasks', function () {
//     $tasks = DB::table('tasks')->get();

//      $tasks = \App\Task::all();
    
//         return view('tasks.index' ,compact('tasks'));

//     });
