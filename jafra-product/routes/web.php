<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', [OrderController::class, 'index'])->name('home');

Route::get('/detail/{id}', [OrderController::class, 'productDetail'])->name('productDetail');

Route::get('/cart', [OrderController::class, "cart"])->name('cart');

/* AJAX req url */
Route::get('/total-cart', [OrderController::class, "totalCart"])->name('totalCart');

Route::post('/add-new-item-chart', [OrderController::class, "insertOrIgnoreCart"])->name('addNewCart');

