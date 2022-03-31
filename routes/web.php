<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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
Route::get('/product/{id}', [ProductController::class, 'returnSingle']);
Route::get('/category/{id}', [CategoryController::class, 'getCategory']);
Route::get('/cart', [CartController::class, 'index']);

Route::post('/orderHistory', [OrderController::class, 'getOrders']);
Route::post('/addToCart', [ProductController::class, 'addToCart']);
Route::post('/updateAmount', [CartController::class, 'updateAmount']);
Route::post('/confirmOrder', [OrderController::class, 'confirmOrder']);

Route::get('/', [CategoryController::class, 'index']); 
Route::get('/home', [CategoryController::class, 'index']);
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
