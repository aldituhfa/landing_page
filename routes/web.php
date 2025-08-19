<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::view('/products', 'products')->name('products');
Route::view('/products/{id}', 'product-detail')->name('product.detail');
