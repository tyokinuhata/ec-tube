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
    if (Auth::check()) return redirect('foods');
    return view('welcome');
});

Route::group([ 'prefix' => 'foods', 'middleware' => 'auth' ], function () {
    Route::get('/', 'FoodsController@index');

    Route::get('/list', 'FoodsController@list');
});

Route::group([ 'prefix' => 'carts', 'middleware' => 'auth' ], function () {
    Route::get('/', 'CartsController@index');

    Route::post('/store', 'CartsController@store');

    Route::get('/count', 'CartsController@count');
});

Route::get('/user', 'UserController@user');

Auth::routes();