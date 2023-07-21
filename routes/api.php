<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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


Route::controller(UserController::class)->group(function () {
    route::post('/register', 'store');
});

route::controller(AuthController::class)->group(function () {
    route::post('/login', 'login');
    route::post('/logout', 'logout');
    route::post('/data', 'data')->middleware('auth:sanctum');
});
