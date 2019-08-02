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
    return view('welcome');
});

Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function(){
	Route::apiResource('products', 'Admin\ProductController');
	Route::apiResource('types', 'Admin\TypeController')->only('index');
});

Route::prefix('/guest')->name('guest.')->group(function(){
	Route::apiResource('products', 'Guest\ProductController')->only('index', 'show');
	Route::apiResource('types', 'Guest\TypeController')->only('index');
});
