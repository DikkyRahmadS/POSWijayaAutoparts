<?php

namespace App\Http\Controllers;


use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $produk = Produk::count();
        $kategori = Kategori::count();
        $supplier = Supplier::count();
        $user = User::count();

        return view('dashboard', compact(
            'produk',
            'kategori',
            'supplier',
            'user'
        ));
    }
}
