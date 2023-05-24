@extends('layouts.master')
@section('laporan', 'Laporan')
@section('title', 'Laporan')
@section('content')

    <div class="card card-flush">
        <div class="card-body pt-10">
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

                    <div class="col-sm-3 mt-8">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
            {{-- <a href="/laporan/cetak_pdf_produk"><button class="btn btn-primary ">Cetak PDF</button></a> --}}
            <form action="{{ route('laporan.cetak_pdf_produk') }}" method="POST">
                @csrf
                @foreach ($produks as $produk)
                    <input type="hidden" name="getFilteredProduks[]" value="{{ json_encode($produk) }}">
                @endforeach
                <button type="submit" class="btn btn-dark">Export to PDF</button>
            </form>
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


            <a href="/laporan"><button class="btn btn-primary">Kembali</button></a>
        </div>
    </div>
@endsection
