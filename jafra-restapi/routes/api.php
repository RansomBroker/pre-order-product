<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/login', 'login');
        Route::get('/logout', 'logout');
        Route::get('/refresh', 'refresh');
        /* test api auth*/
        Route::get('/user', 'getAuthUser');
    });
});

/*check tokenvaliditiy*/
Route::get('/token-validity', [AuthController::class, 'tokenValidity']);

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
