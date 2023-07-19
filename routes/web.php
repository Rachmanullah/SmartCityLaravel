<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
})->name('dashboard');

//role
Route::controller(RoleController::class)->group(function () {
    route::get('role', 'index')->name('role.index');
    route::post('role/store', 'store')->name('role.store');
    route::put('role/update/{id}', 'update')->name('role.update');
    route::get('role/delete/{id}', 'delete')->name('role.delete');
});

//uer
Route::controller(UserController::class)->group(function () {
    route::get('user', 'index')->name('user.index');
    route::post('user/store', 'store')->name('user.store');
    route::put('user/update/{id}', 'update')->name('user.update');
    route::get('user/delete/{id}', 'delete')->name('user.delete');
});
