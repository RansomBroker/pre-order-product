<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
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

Route::controller(OrderController::class)->group(function (){
    Route::get('/', 'index')->name('home');

    Route::get('/detail/{id}', 'productDetail')->name('productDetail');

    Route::get('/cart', 'cart')->name('cart');

    /* AJAX req url */
    Route::get('/total-cart', 'totalCart')->name('totalCart');

    Route::post('/add-new-item-chart', 'insertOrIgnoreCart')->name('addNewCart');

    Route::get('/cart/create-order', 'createOrder')->name('createOrder');

    Route::get('/total-notification','totalOrder')->name('totalOrder');

    Route::get('/get-order','getOrder')->name('getOrder');
});

Route::controller(AdminController::class)->group(function (){
    Route::middleware(['auth'])->group(function (){
        Route::get('/admin/dashboard', 'index')->name('dashboard');
        Route::get('/admin/order-list', 'order')->name('orderList');

    });
    /* auth route */
    Route::get('/admin/login', 'login')->name('login');
    Route::post('/admin/login/auth', 'auth')->name('auth');
    Route::get('/admin/logout', 'logout')->name('logout');


});
