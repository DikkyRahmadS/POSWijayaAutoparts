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
        $pendapatan = PenjualanDetail::select(DB::raw("CAST(SUM(subtotal) AS int) as pendapatan"), DB::raw("MONTH(created_at) as bulan"))
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->orderBy(DB::raw("MONTH(created_at)"), 'asc')
            ->pluck('pendapatan');
        $total_pendapatan = $pendapatan->sum();
        $produk_terjual = DB::table('penjualan_details')
                        ->join('produks', 'penjualan_details.produk_id', '=', 'produks.id')
                        ->select(DB::raw("SUM(penjualan_details.jumlah) as sum"), 'produks.nama_produk')
                        ->whereYear('penjualan_details.created_at', date('Y'))
                        ->groupBy('penjualan_details.produk_id', 'produks.nama_produk')
                        ->pluck('sum', 'produks.nama_produk');
        $total_produk = $produk_terjual->sum();
        $total_transaksi = Penjualan::whereYear('created_at', date('Y'))
                            ->whereMonth('created_at', date('m'))
                            ->count();
        $mean_penjualan = DB::table('penjualan_details')
                            ->where(DB::raw("WEEK(created_at)"), date('W'))
                            ->groupBy(DB::raw("WEEK(created_at)"))
                            ->avg('subtotal');
        $bulan = PenjualanDetail::select(DB::raw("MONTHNAME(created_at) as bulan"))
                    ->distinct()
                    ->orderBy(DB::raw("MONTH(created_at)"), 'asc')
                    ->pluck('bulan');

                    // dd($bulan);
        $penjualan_perhari = PenjualanDetail::select(DB::raw("CAST(SUM(subtotal) AS int) as pendapatan"), DB::raw("DAY(created_at) as hari"))
                                ->where(DB::raw("WEEK(created_at)"), date('W'))
                                ->groupBy(DB::raw("DAY(created_at)"))
                                ->get()
                                ->pluck('pendapatan');
                                //dd($penjualan_perhari);
        $hari = Penjualan::select(DB::raw("DAYNAME(created_at)"))
                    ->whereWeek(DB::raw("WEEK(created_at)"), date('W'))
                    ->distinct();
                    // dd($hari);
        

        // dd($bulan);
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
            'produk_terjual',
            'total_produk',
            'total_transaksi',
            'mean_penjualan',
            'bulan',
            'penjualan_perhari',
            'hari',
            'produk_kategori',
            'drilldown_produk'

        ));
    }
}
