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
Route::get('/product/{id}', [ProductController::class, 'returnSpecific']);
Route::get('/cart', [CartController::class, 'index']);
Route::get('/addToCart/{id}', [ProductController::class, 'getForCart']);

Route::get('/', [CategoryController::class, 'index']);