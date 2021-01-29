<?php

use Illuminate\Support\Facades\Route;

// Load login as main view
Route::get('/', function () {
    return view('auth.login');
});

// Dashboard view with auth
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// Load products and shopping cart views with a prefix
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/products', function () {
        return view('crud.products');
    });
    Route::get('/shopping-cart', function () {
        return view('crud.shopping-cart');
    });
});
