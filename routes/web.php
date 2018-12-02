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

    Route::post('/add', 'FoodsController@add');

    Route::get('/cart', 'FoodsController@index');
});

Auth::routes();