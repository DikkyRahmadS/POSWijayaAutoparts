<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::resource('kategori', KategoriController::class);
Route::resource('pengguna', PenggunaController::class);
Route::resource('produk', ProdukController::class);
Route::resource('supplier', SupplierController::class);
Route::resource('laporanpenjualan', PendapatanController::Class);
route::get('/masuk', [LoginController::class, 'halamanlogin']);
route::post('postmasuk', [LoginController::class, 'postmasuk'])->name('postmasuk');


// Route::group(['middleware' => ['role']], function () {
//     Route::resource('kategori', KategoriController::class);
// });
