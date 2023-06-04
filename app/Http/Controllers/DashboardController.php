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
        $pendapatan = DB::table('penjualans')
            ->select(DB::raw("MONTH(created_at) as bulan"), DB::raw("CAST(SUM(bayar) AS int) as pendapatan"))
            ->whereYear('created_at', date('Y'))
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->get();
        $total_pendapatan = Penjualan::select(DB::raw("CAST(SUM(bayar) AS INT) as total_pendapatan"))
            ->whereYear('created_at', date('Y'))
            ->pluck('total_pendapatan')
            ->sum();
        $total_produk = DB::table('penjualan_details')
            ->select(DB::raw("SUM(penjualan_details.jumlah) as sum"))
            ->pluck('sum');
        $mean_penjualan = DB::table('penjualans')
            ->select(DB::raw("CAST(SUM(bayar)/7 AS INT) AS mean"))
            ->where(DB::raw("WEEK(created_at)"), "=", DB::raw("WEEK(NOW())"))
            ->whereYear('created_at', date('Y'))
            ->get();
        $penjualan_perhari = DB::table('penjualans')
            ->select(DB::raw("DAYNAME(created_at) as hari"), DB::raw("CAST(SUM(bayar) AS int) as pendapatan"))
            ->where(DB::raw("YEAR(created_at)"), "=", DB::raw("YEAR(NOW())"))
            ->where(DB::raw("WEEK(created_at)"), "=", DB::raw("WEEK(NOW())"))
            ->groupBy('hari')
            ->orderBy('created_at', 'asc')
            ->get();
        // dd($penjualan_perhari);
        $produk_kategori = DB::table('penjualan_details')
            ->join('produks', 'penjualan_details.produk_id', '=', 'produks.id')
            ->join('kategoris', 'produks.kategori_id', '=', 'kategoris.id')
            ->select(DB::raw("kategoris.nama_kategori as name"), DB::raw("SUM(penjualan_details.jumlah) as y", DB::raw("produks.kategori_id as id")))
            ->groupBy('name', 'produks.kategori_id')
            ->get();
        $drilldown_produk = DB::table('penjualan_details')
            ->join('produks', 'penjualan_details.produk_id', '=', 'produks.id')
            ->join('kategoris', 'produks.kategori_id', '=', 'kategoris.id')
            ->select(DB::raw("kategoris.nama_kategori as nama_kategori"), DB::raw("CAST(SUM(penjualan_details.jumlah) as INT) as y"), DB::raw("produks.id as id"), DB::raw("produks.nama_produk as nama_produk"))
            ->groupBy('nama_kategori', 'id', 'nama_produk')
            ->get();
        // dd($drilldown_produk);
        // dd($produk_kategori);


        return view('dashboard', compact(
            'produk',
            'kategori',
            'supplier',
            'user',
            'pendapatan',
            'total_pendapatan',
            'total_produk',
            'mean_penjualan',
            'penjualan_perhari',
            'produk_kategori',
            'drilldown_produk'

        ));
    }
}
