<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;
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
    route::post('/update/{id}', 'update')->middleware('auth:sanctum');
});

route::controller(AuthController::class)->group(function () {
    route::post('/login', 'login');
    route::post('/logout', 'logout');
    route::post('/data', 'data')->middleware('auth:sanctum');
});

route::controller(LaporanController::class)->group(function () {
    route::get('laporan', 'index')->name('laporan.index');
    route::get('laporan/{id}', 'getPerId')->name('laporan.getPerId');
    route::post('laporan/store', 'store')->name('laporan.store')->middleware('auth:sanctum');
});
