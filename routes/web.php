<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\is_Auth;
use Illuminate\Support\Facades\Auth;
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

route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return view('index');
})->name('login');

route::post('admin/login', [adminController::class, 'login'])->name('admin.login');
route::middleware([is_Auth::class])->group(function () {
    route::controller(adminController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        route::get('/admin/logout', 'logout')->name('logout');
    });

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
        route::post('user/update/{id}', 'update')->name('user.update');
        route::get('user/delete/{id}', 'delete')->name('user.delete');
    });

    //laporan
    route::controller(LaporanController::class)->group(function () {
        route::get('laporan', 'index')->name('laporan.index');
        route::post('laporan/store', 'store')->name('laporan.store');
        route::get('laporan/delete/{id}', 'destroy')->name('laporan.delete');
        route::put('laporan/update/{id}', 'update')->name('laporan.update');
        route::get('laporan/print', 'print')->name('laporan.print');
    });
});
