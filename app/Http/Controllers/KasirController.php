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

    public function filter($id)
    {

        $kategoris = Kategori::all();
        $produks = Produk::where("kategori_id", $id)->get();
        return view("kasir.index", compact("produks", "kategoris"));
        // $produks = Produk::find($kategoris->i);
        // return view("kasir.index", compact("produks", "kategoris"));
    }
}
