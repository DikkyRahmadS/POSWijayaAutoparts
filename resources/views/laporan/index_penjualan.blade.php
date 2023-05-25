@extends('layouts.master')
@section('menu', 'Daftar Laporan')
@section('title', 'Laporan Penjualan')
@section('content')

    <div class="card card-flush">
        <div class="card-body pt-10">
            <form action="/laporan/index_penjualan" method="GET">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="" class="form-label">Tanggal Awal</label>
                        <input type="date" class="form-control" name="tanggal_awal" value="{{ old('tanggal_awal') }}">
                    </div>
                    <div class="col-sm-3">
                        <label for="" class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="tanggal_akhir" value="{{ old('tanggal_akhir') }}">
                    </div>

                    <div class="col-sm-3 mt-8">
                        <button type="submit" name="search" class="btn btn-primary">Search</button>
                        <!-- <button type="submit" class="btn btn-primary" name="exportPDF" a href="/laporan/cetak_pdf_penjualan">Export to PDF</button> -->
                    </div>
                </div>
            </form>
            {{-- <a href="/laporan/cetak_pdf_penjualan"><button class="btn btn-primary ">Cetak PDF</button></a> --}}
            <form action="{{ route('laporan.cetak_pdf_penjualan') }}" method="POST">
                @csrf
                @foreach ($penjualansDetail as $penjualanDetail)
                    <input type="hidden" name="getFilteredPenjualans[]" value="{{ json_encode($penjualanDetail) }}">
                @endforeach
                <button type="submit" class="btn btn-dark">Export to PDF</button>
            </form>



            <table class="table align-middle table-row-dashed fs-6 gy-5" id="penjualantable">
                <thead>
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-10px "> No </th>
                        <th class="min-w-70px">Tanggal Transaksi</th>
                        <th class="min-w-70px">Id Penjualan</th>
                        <th class="min-w-70px">Nama Produk</th>
                        <th class="min-w-70px pe-2 ">Total Item </th>
                        <th class="min-w-70px pe-2 ">Total Harga </th>
                        <th class="min-w-70px">Diskon</th>
                        <th class="min-w-70px">Bayar</th>
                        <th class="min-w-70px text-end"></th>
                    </tr>
                </thead>
                @php
                    $counter = $penjualansDetail->firstItem();
                    $totalHarga = 0;
                @endphp
                <tbody>
                    @foreach ($penjualansDetail as $penjualanDetail)
                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td>{{ $penjualanDetail->created_at->format('d M Y') }}</td>
                            <td>{{ $penjualanDetail->penjualan_id }}</td>
                            <td>{{ $penjualanDetail->produk->nama_produk }}</td>
                            <td>{{ $penjualanDetail->jumlah }}</td>
                            <td>Rp. {{ format_uang($penjualanDetail->subtotal) }}</td>
                            <td>{{ $penjualanDetail->penjualan->diskon }}</td>
                            <td>Rp. {{ format_uang($penjualanDetail->penjualan->diterima) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $penjualansDetail->links() }}


            <a href="/laporan"><button class="btn btn-primary">Kembali</button></a>
        </div>
    </div>
@endsection
