<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PendapatanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PembelianDetailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenjualanDetailController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\LaporanController;

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
route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('preventBackHistory');
route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');

Route::group(
    ['middleware' => 'auth'],
    function () {
        route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::group(
            ['middleware' => 'role:1'],
            function () {
                Route::get('/kategori/data', [KategoriController::class, 'data'])->name('kategori.data');
                Route::resource('kategori', KategoriController::class);

                Route::get('/pengguna/data', [PenggunaController::class, 'data'])->name('pengguna.data');
                Route::resource('pengguna', PenggunaController::class);

                Route::get('/produk/data', [ProdukController::class, 'data'])->name('produk.data');
                Route::resource('produk', ProdukController::class);

                Route::get('/supplier/data', [SupplierController::class, 'data'])->name('supplier.data');
                Route::resource('supplier', SupplierController::class);

                Route::get('/pembelian/data', [PembelianController::class, 'data'])->name('pembelian.data');
                Route::get('pembelian/{id}/create', [PembelianController::class, 'create'])->name('pembelian.create');
                Route::resource('pembelian', PembelianController::class)
                    ->except('create');

                Route::get('/pembeliandetail/{id}/data', [PembelianDetailController::class, 'data'])->name('pembeliandetail.data');
                Route::get('/pembeliandetail/loadform/{diskon}/{total}', [PembelianDetailController::class, 'loadForm'])->name('pembeliandetail.load_form');
                Route::resource('pembeliandetail', PembelianDetailController::class)
                    ->except('create', 'show', 'edit');

                Route::get('/laporanpendapatan', [PendapatanController::class, 'index'])->name('laporan.index');
                Route::get('/laporanpendapatan/data/{awal}/{akhir}', [PendapatanController::class, 'data'])->name('laporan.data');
                Route::get('/laporanpendapatan/pdf/{awal}/{akhir}', [PendapatanController::class, 'exportPDF'])->name('laporan.export_pdf');
            }
        );

        Route::group(
            ['middleware' => 'role:1,0'],
            function () {

                Route::get('/penjualan/data', [PenjualanController::class, 'data'])->name('penjualan.data');
                Route::resource('penjualan', PenjualanController::class)
                    ->except('create');

                Route::get('/transaksi/baru', [PenjualanController::class, 'create'])->name('transaksi.baru');
                Route::post('/transaksi/simpan', [PenjualanController::class, 'store'])->name('transaksi.simpan');
                Route::get('/transaksi/{id}/data', [PenjualanDetailController::class, 'data'])->name('transaksi.data');
                Route::get('/transaksi/loadform/{diskon}/{total}/{diterima}', [PenjualanDetailController::class, 'loadForm'])->name('transaksi.load_form');
                Route::resource('/transaksi', PenjualanDetailController::class)
                    ->except('show');
            }
        );
    }
);

// laporan
Route::get('/laporan', [LaporanController::class, 'index'])->name("laporan.index");
Route::post('/laporan/cetak_pdf_produk', [LaporanController::class, 'cetak_pdf_produk'])->name("laporan.cetak_pdf_produk");
Route::post('/laporan/cetak_pdf_supplier', [LaporanController::class, 'cetak_pdf_supplier'])->name("laporan.cetak_pdf_supplier");
Route::get('/laporan/index_produk', [LaporanController::class, 'produk'])->name("laporan.produk");
Route::get('/laporan/index_supplier', [LaporanController::class, 'supplier'])->name("laporan.supplier");
