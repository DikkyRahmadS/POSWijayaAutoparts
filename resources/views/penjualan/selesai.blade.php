@extends('layouts.master')
@section('menu', 'Menu')
@section('title', 'Transaksi Penjualan')
@section('content')
    <div class="card card-flush">
        <div class="card-body pt-10">
            <div class="box">
                <div class="box-body">
                    <div class="alert alert-success alert-dismissible">
                        <i class="fa fa-check icon"></i>
                        Data Transaksi telah selesai.
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-warning btn-flat" onclick="nota('{{ route('transaksi.nota') }}', 'Nota')">Cetak
                        Ulang Nota</button>
                    <a href="{{ route('transaksi.baru') }}" class="btn btn-primary btn-flat">Transaksi Baru</a>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        function nota(url, title) {
            popupCenter(url, title, 550, 500);
        }

        function popupCenter(url, title, w, h) {
            const dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : window.screenX;
            const dualScreenTop = window.screenTop !== undefined ? window.screenTop : window.screenY;

            const width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document
                .documentElement.clientWidth : screen.width;
            const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document
                .documentElement.clientHeight : screen.height;

            const systemZoom = width / window.screen.availWidth;
            const left = (width - w) / 2 / systemZoom + dualScreenLeft
            const top = (height - h) / 2 / systemZoom + dualScreenTop
            const newWindow = window.open(url, title,
                `
            scrollbars=yes,
            width  = ${w / systemZoom},
            height = ${h / systemZoom},
            top    = ${top},
            left   = ${left}
        `
            );

            if (window.focus) newWindow.focus();
        }
    </script>
@endpush
