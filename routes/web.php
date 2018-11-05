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
    if (Auth::check()) return redirect('items');
    return view('welcome');
});

Route::group([ 'prefix' => 'items', 'middleware' => 'auth' ], function () {
    Route::get('/', 'ItemsController@index');

    Route::get('/{id}', 'ItemsController@detail');

    Route::post('/add', 'ItemsController@add');

    Route::get('/cart', 'ItemsController@index');
});

Auth::routes();