@extends('layouts.master')
@section('laporan', 'Laporan')
@section('title', 'Laporan')
@section('content')

    <div class="card card-flush">
        <div class="card-body pt-10">
            <form action="/laporan/index_supplier" method="GET">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="" class="form-label">Nama Supplier</label>
                        <input type="text" class="form-control" name="nama">
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
            <form action="{{ route('laporan.cetak_pdf_supplier') }}" method="POST">
                @csrf
                @foreach ($pembeliansDetail as $pembelianDetail)
                    <input type="hidden" name="getFilteredSupplier[]" value="{{ json_encode($pembelianDetail) }}">
                @endforeach
                <button type="submit" class="btn btn-primary">Export to PDF</button>
            </form>
            {{-- <a href="/laporan/cetak_pdf_supplier"><button class="btn btn-primary ">Cetak PDF</button></a> --}}
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="produktable">
                <thead>
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-10px "> No </th>
                        <th class="min-w-70px">Nama</th>
                        <th class="min-w-70px">Alamat</th>
                        <th class="min-w-70px pe-2 ">No hp </th>
                        <th class="min-w-70px pe-2 ">Produk supply </th>
                        <th class="min-w-70px pe-2 ">Stok </th>

                    </tr>
                </thead>
                @php
                    $i = 1;
                @endphp
                <tbody>
                    @foreach ($pembeliansDetail as $pembelianDetail)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $pembelianDetail->pembelian->supplier->nama }}</td>
                            <td>{{ $pembelianDetail->pembelian->supplier->alamat }}</td>
                            <td>{{ $pembelianDetail->pembelian->supplier->no_hp }}</td>
                            <td>{{ $pembelianDetail->produk->nama_produk }}</td>
                            <td>{{ $pembelianDetail->produk->stok }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $pembeliansDetail->links() }}

            <a href="/laporan"><button class="btn btn-primary">Kembali</button></a>
        </div>
    </div>
@endsection
