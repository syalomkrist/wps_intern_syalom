<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;

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
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/user', [\App\Http\Controllers\UserDashboardController::class, 'index'])->name('user');

  });

Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function() {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('admin');
    Route::resource('/laporan', \App\Http\Controllers\LaporanController::class);

    // Tambahan route package Produk
    Route::resource('/tambahlaporan', \App\Http\Controllers\LaporanController::class);
    Route::post('/laporan/{laporan}/approve', [\App\Http\Controllers\LaporanController::class])->name('laporan.approve');
    Route::post('/laporan/{laporan}/reject', [\App\Http\Controllers\LaporanController::class])->name('laporan.reject');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
