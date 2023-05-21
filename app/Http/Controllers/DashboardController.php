<?php

namespace App\Http\Controllers;


use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Pendapatan;
use App\Models\PenjualanDetail;
use App\Models\Penjualan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function dashboard()
    {
        $produk = Produk::count();
        $kategori = Kategori::count();
        $supplier = Supplier::count();
        $user = User::count();
        $pendapatan = Pendapatan::select(DB::raw("SUM(harga_jual*qty) as sum, MONTH(created_at)"))
                        ->whereYear('created_at', date('Y'))
                        ->groupBy(DB::raw("MONTH(created_at)"))
                        ->pluck('sum');
        $total_pendapatan = $pendapatan->sum();
        $produk_terjual = DB::table('penjualan_details')
                        ->join('produks', 'penjualan_details.produk_id', '=', 'produks.id')
                        ->select(DB::raw("SUM(penjualan_details.jumlah) as sum"), 'produks.nama_produk')
                        ->whereYear('penjualan_details.created_at', date('Y'))
                        ->groupBy('penjualan_details.produk_id', 'produks.nama_produk')
                        ->pluck('sum', 'produks.nama_produk');
        $total_produk = $produk_terjual->sum();
        $total_transaksi =  Penjualan::whereYear('created_at', date('Y'))
                            ->whereMonth('created_at', date('m'))
                            ->count();
        $mean_penjualan = DB::table('penjualan_details')
                            ->where(DB::raw("WEEK(created_at)"), date('W'))
                            ->groupBy(DB::raw("WEEK(created_at)"))
                            ->avg('subtotal');
        

        return view('dashboard', compact(
            'produk',
            'kategori',
            'supplier',
            'user',
            'pendapatan',
            'total_pendapatan',
            'produk_terjual',
            'total_produk',
            'total_transaksi',
            'mean_penjualan'
        ));
    }
}
