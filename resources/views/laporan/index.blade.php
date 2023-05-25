@extends('layouts.master')
@section('menu', 'Menu')
@section('title', 'Daftar Laporan')
@section('content')
    <div class="card card-flush">
        <div class="card-body pt-10">
            {{-- <h1>Ini laporan</h1> --}}
            <div class="dropdown ">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Pilih Laporan
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="/laporan/index_produk">Produk</a></li>
                    <li><a class="dropdown-item" href="/laporan/index_supplier">Supplier</a></li>
                    <li><a class="dropdown-item" href="/laporan/index_penjualan">Penjualan</a></li>
                    <li><a class="dropdown-item" href="/laporanpendapatan">Pendapatan</a></li>
                    {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                </ul>
            </div>

        </div>
    </div>
@endsection
