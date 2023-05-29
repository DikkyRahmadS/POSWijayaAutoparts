@extends('layouts.master')
@section('menu', 'Daftar Laporan')
@section('title', 'Laporan Supplier')
@section('content')

    <div class="card card-flush">
        <div class="card-header align-items-center pt-5 gap-2 gap-md-5">
            <!--begin::Card title-->
            <div class="card-title">
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

                        <div class="col-sm-2 mt-9">
                            <button type="submit" class="btn btn-primary" style="width:100px;"><i class="fa fa-search"
                                    aria-hidden="true"></i> Cari</button>
                        </div>
                </form>
                        <div class="col-sm-3 mt-9">
                            <form action="{{ route('laporan.cetak_pdf_supplier') }}" method="POST">
                                @csrf
                                @foreach ($pembeliansDetail as $pembelianDetail)
                                    <input type="hidden" name="getFilteredSupplier[]" value="{{ json_encode($pembelianDetail) }}">
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
                        <th class="min-w-70px">Nama</th>
                        <th class="min-w-70px">Alamat</th>
                        <th class="min-w-70px pe-2 ">No hp </th>
                        <th class="min-w-70px pe-2 ">Produk supply </th>
                        <th class="min-w-70px pe-2 ">Stok </th>

                    </tr>
                </thead>
                @php
                    $counter = $pembeliansDetail->firstItem();
                @endphp
                <tbody>
                    @foreach ($pembeliansDetail as $pembelianDetail)
                        <tr>
                            <td>{{ $counter++ }}</td>
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
        </div>
    </div>
@endsection
