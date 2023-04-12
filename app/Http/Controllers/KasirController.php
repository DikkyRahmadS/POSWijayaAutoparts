<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class KasirController extends Controller
{
    //
    public function index()
    {
        $produks = Produk::all();
        return view("kasir.index", compact("produks"));
        dd($produks);
    }
}
