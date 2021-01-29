<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route for create users
Route::post('users', 'UserController@store');
Route::post('login', 'UserController@login');
// Group API for versions
Route::group(['prefix' => 'v1', 'middleware' => 'auth:sanctum'], function () {
    // Create index route API
    Route::apiResource('products', 'ProductsController');
    Route::apiResource('shopping-cart', 'ShoppingCartController');
    Route::post('logout', 'UserController@logout');
});

Route::group(['prefix' => 'v2'], function () {
    // Create index route API
    Route::apiResource('products', 'ProductsController');
    Route::apiResource('shopping-cart', 'ShoppingCartController');
});
