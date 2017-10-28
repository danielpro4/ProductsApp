<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// 'middleware' => 'auth:api'
// Controllers Within The "App\Http\Controllers\Api" Namespace
Route::namespace('Api')->prefix('v1')->group(function($router) {

    $router->get('/products', 'ProductController@index');
    $router->get('/products/{text}', 'ProductController@search');

});

