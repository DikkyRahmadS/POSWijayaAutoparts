@extends('layouts.master')
@section('menu', 'Daftar Laporan')
@section('title', 'Laporan Produk')
@section('content')

    <div class="card card-flush">
        <div class="card-header align-items-center pt-5 gap-2 gap-md-5">
            <!--begin::Card title-->
            <div class="card-title">
                <form action="/laporan/index_produk" method="GET">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="row mb-3">
                        {{-- <div class="col-sm-3">
                        <label for="" class="form-label">Kode Produk</label>
                        <input type="text" class="form-control">
                    </div> --}}
                        <div class="col-sm-3">
                            <label for="" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk">
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="form-label">Stok</label>
                            <input type="number" class="form-control" name="stok">
                        </div>

                        <div class="col-sm-2 mt-9">
                            <button type="submit" class="btn btn-primary" style="width:100px;"><i class="fa fa-search"
                                    aria-hidden="true"></i> Cari</button>
                        </div>

                </form>
                <div class="col-sm-2 mt-9">
                    <form action="{{ route('laporan.cetak_pdf_produk') }}" method="POST">
                        @csrf
                        @foreach ($produks as $produk)
                            <input type="hidden" name="getFilteredProduks[]" value="{{ json_encode($produk) }}">
                        @endforeach
                        <button type="submit" class="btn btn-dark" style="width:140px"><i class="bi bi-file-pdf"
                                aria-hidden="true"></i> Export PDF</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="produktable">
            <thead>
                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                    <th class="min-w-10px "> No </th>
                    <th class="min-w-70px">Kode Produk</th>
                    <th class="min-w-70px">Nama Produk</th>
                    <th class="min-w-70px pe-2 ">Kategori </th>
                    <th class="min-w-70px pe-2 ">Berat </th>
                    <th class="min-w-10px">Harga Jual</th>
                    <th class="min-w-70px">Stok</th>
                    <th class="min-w-70px text-end"></th>
                </tr>
            </thead>
            @php
                $counter = $produks->firstItem();
            @endphp
            <tbody>
                @foreach ($produks as $produk)
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{ $produk->kode_produk }}</td>
                        <td>{{ $produk->nama_produk }}</td>
                        <td>{{ $produk->kategori->nama_kategori }}</td>
                        <td>{{ $produk->berat }} g</td>
                        <td>Rp. {{ format_uang($produk->harga_jual) }}</td>
                        <td>{{ $produk->stok }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $produks->links() }}
    </div>
    </div>
@endsection
