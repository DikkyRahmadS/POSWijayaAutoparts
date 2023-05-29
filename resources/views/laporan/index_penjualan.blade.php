@extends('layouts.master')
@section('menu', 'Daftar Laporan')
@section('title', 'Laporan Penjualan')
@section('content')

    <div class="card card-flush">
        <div class="card-header align-items-center pt-5 gap-2 gap-md-5">
            <!--begin::Card title-->
            <div class="card-title">
                <form action="/laporan/index_penjualan" method="GET">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label for="" class="form-label">Tanggal Awal</label>
                            <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal"
                                value="{{ request('tanggal_awal') }}">
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="form-label">Tanggal Akhir</label>
                            <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir"
                                value="{{ request('tanggal_akhir') ?? date('Y-m-d') }}">
                        </div>

                        <div class="col-sm-2 mt-9">
                            <button type="submit" name="search" class="btn btn-primary" style="width:100px;"><i
                                    class="fa fa-search" aria-hidden="true"></i> Cari</button>
                        </div>
                </form>
                <div class="col-sm-3 mt-9">
                    <form action="{{ route('laporan.cetak_pdf_penjualan') }}" method="POST">
                        @csrf
                        @foreach ($penjualansDetail as $penjualanDetail)
                            <input type="hidden" name="getFilteredPenjualans[]"
                                value="{{ json_encode($penjualanDetail) }}">
                        @endforeach
                        <button type="submit" class="btn btn-dark" style="width:140px"><i class="bi bi-file-pdf"
                                aria-hidden="true"></i> Export PDF</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
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
@push('scripts')
    <script>
        // Mendapatkan referensi ke elemen input tanggal_awal dan tanggal_akhir
        const tanggalAwalInput = document.getElementById('tanggal_awal');
        const tanggalAkhirInput = document.getElementById('tanggal_akhir');

        // Menambahkan event listener pada tanggal_awal saat nilai berubah
        tanggalAwalInput.addEventListener('change', function() {
            const selectedDate = new Date(this.value);
            const minDate = selectedDate.toISOString().split('T')[0];
            tanggalAkhirInput.min = minDate;
        });

        const today = new Date();
        const maxDate = today.toISOString().split('T')[0];
        tanggalAwalInput.max = maxDate;
        tanggalAkhirInput.max = maxDate;
    </script>
@endpush
