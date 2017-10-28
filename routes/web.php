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
    return view('index');
});

Auth::routes();

Route::get('/pricing', 'HomeController@index')->name('pricing');
Route::get('/selling', 'HomeController@selling')->name('selling');

Route::group(['prefix' => 'admin/users'], function () {

    Route::get('/', 'UsersController@index')->name('users.all');
    Route::get('create', 'UsersController@create')->name('user.create');
    Route::post('create', 'UsersController@store');
    Route::get('{user}', 'UsersController@view')->name('user.view');
    Route::get('{user}/edit', 'UsersController@edit')->name('user.edit');
    Route::post('{user}/edit', 'UsersController@update');
    Route::delete('{user}', 'UsersController@destroy')->name('user.delete');

    //Route::post('status', 'ActiveUsersController@store')->name('user.activate');
    //Route::delete('status/{id}', 'ActiveUsersController@destroy')->name('user.deactivate');
    //Route::get('{user}/run', 'ExecuteUsersController@index')->name('user.run');
});

Route::group(['prefix' => 'admin/products'], function () {
    Route::get('/', 'ProductsController@index')->name('products.all');
    Route::get('create', 'ProductsController@create')->name('product.create');
    Route::post('create', 'ProductsController@store');
    Route::get('{product}', 'ProductsController@view')->name('product.view');
    Route::get('{product}/edit', 'ProductsController@edit')->name('product.edit');
    Route::post('{product}/edit', 'ProductsController@update');
    Route::delete('{product}', 'ProductsController@destroy')->name('product.delete');
    Route::post('toggle', 'ProductsController@toggle')->name('product.toggle');

    Route::get('/indexable', function () {
        $p = new \App\Product();
        return $p->toSearchableArray();
    });
});