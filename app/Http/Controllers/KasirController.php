<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Produk;

class KasirController extends Controller
{
    //
    public function index()
    {
        $produks = Produk::all();
        $kategoris = Kategori::all();
        return view("kasir.index", compact("produks", "kategoris"));
        dd($produks);
    }
}
