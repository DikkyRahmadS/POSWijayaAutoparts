<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KasirController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



route::get('/masuk', [LoginController::class, 'halamanlogin'])->name('login');
route::get('/logout', [LoginController::class, 'logout'])->name('logout');
route::post('postlogin', [LoginController::class, 'postlogin'])->name('postlogin');


Route::group(['middleware' => ['auth', 'role']], function () {
    route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('kategori', KategoriController::class);
    Route::resource('pengguna', PenggunaController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('laporanpenjualan', PendapatanController::Class);
});

Route::group(['middleware' => ['auth', 'role:1,0']], function () {
    Route::get('/kasir', [KasirController::class, 'index']);
});
