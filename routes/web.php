<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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
Route::get('/products', [ProductController::class, 'returnAll']);
Route::get('/category/{id}', [CategoryController::class, 'getCategory']);
Route::get('/cart', [CartController::class, 'index']);
Route::post('/addToCart', [ProductController::class, 'getForCart']);
Route::post('/updateAmount', [CartController::class, 'updateAmount']);

Route::get('/', [CategoryController::class, 'index']);
Route::get('/home', [CategoryController::class, 'index']);
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
