@extends('layouts.master')
@section('menu', 'Kelola Produk')
@section('title', 'Daftar Produk')
@section('content')

    <div class="card card-flush">
        <!--begin::Card header-->
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <!--begin::Card title-->
            <div class="card-title">
                <button onclick="addForm('{{ route('produk.store') }}')" class="btn btn-primary"><i
                        class="fa fa-plus-circle"></i> Tambah
                    Produk</button>
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">

            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="produktable">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-10px "> No </th>
                        <th class="min-w-70px">Barcode</th>
                        <th class="min-w-70px">Nama Produk</th>
                        <th class="min-w-70px pe-2 ">Kategori </th>
                        <th class="min-w-70px pe-2 ">Ukuran </th>
                        <th class="min-w-10px">Harga Jual</th>
                        <th class="min-w-10px">Stok</th>
                        <th class="min-w-70px text-end"></th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--begin::Body-->
                <!--begin::Table body-->
                <!--end::Table body-->
            </table>
            <!--end::Table-->

        </div>
        <!--end::Table container-->
        @includeIf('produk.form')

    </div>
@endsection

@push('scripts')
    <script>
        function printBarcode(barcode) {
            // Membuka window baru untuk print barcode
            var printWindow = window.open('', '', 'height=400,width=600');
            printWindow.document.write('<html><head><title>Cetak Barcode</title>');
            printWindow.document.write('</head><body style="text-align:center;">');
            printWindow.document.write('<h3>Barcode Produk</h3>');
            printWindow.document.write('<div id="barcodeArea"></div>');
            printWindow.document.write(
                '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></scr' + 'ipt>');
            printWindow.document.write(
                '<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></scr' + 'ipt>');
            printWindow.document.write('<svg id="barcode"></svg>');
            printWindow.document.write('<script>JsBarcode("#barcode", "' + barcode +
                '", {format: "CODE128", width:2, height:60, displayValue:true});<\/script>');
            printWindow.document.write('<button onclick="window.print()" style="margin-top:20px;">Print</button>');
            printWindow.document.write('</body></html>');
            printWindow.document.close();
        }
        let table;
        $(function() {
            $('#kt_body').attr('data-kt-aside-minimize', 'on');
            $(function() {
                table = $('#produktable').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    autoWidth: false,
                    ajax: {
                        url: '{{ route('produk.data') }}',
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            searchable: false,
                            sortable: false
                        },
                        {
                            data: 'barcode',
                            searchable: false,
                            sortable: false
                        },
                        {
                            data: 'nama_produk'
                        },
                        {
                            data: 'nama_kategori'
                        },
                        {
                            data: 'ukuran'
                        },
                        {
                            data: 'harga_jual'
                        },
                        {
                            data: 'stok'
                        },
                        {
                            data: 'aksi',
                            searchable: false,
                            sortable: false
                        },
                    ]
                });

                $('#modal-produk').validator().on('submit', function(e) {
                    e.preventDefault();
                    $.ajax({
                            url: $('#modal-produk form').attr('action'),
                            type: $('#modal-produk form').attr('method'),
                            data: new FormData($('#modal-produk form')[0]),
                            async: false,
                            processData: false,
                            contentType: false
                        })
                        .done(response => {
                            $('#modal-produk').modal('hide');
                            toastr.success('Data Berhasil Disimpan!', {
                                fadeAway: 1000
                            });
                            table.ajax.reload();
                        })
                        .fail(errors => {
                            toastr.error('Data Gagal Disimpan!', {
                                fadeAway: 1000
                            });
                        });
                });
            });
        });

        function addForm(url) {
            $('#modal-produk').modal('show');
            $('#modal-produk .modal-title').text('Tambah produk');

            $('#modal-produk form')[0].reset();
            $('#modal-produk form').attr('action', url);
            $('#modal-produk [name=_method]').val('post');
            $('#modal-produk [name=kode_produk]').focus();
            $('.tampil-foto').html(``);
            $('.stoktxt').html(`* Default 0, produk baru`);
        }

        function editForm(url) {
            $('#modal-produk').modal('show');
            $('#modal-produk .modal-title').text('Edit produk');

            $('#modal-produk form')[0].reset();
            $('#modal-produk form').attr('action', url);
            $('#modal-produk [name=_method]').val('put');
            $('#modal-produk [name=kode_produk]').focus();

            $.get(url)
                .done((response) => {
                    $('#modal-produk [name=kode_produk]').val(response.kode_produk);
                    $('#modal-produk [name=nama_produk]').val(response.nama_produk);
                    $('#modal-produk [name=kategori_id]').val(response.kategori_id);
                    $('#modal-produk [name=ukuran]').val(response.ukuran);
                    $('#modal-produk [name=harga_jual]').val(response.harga_jual);
                    $('#modal-produk [name=stok]').val(response.stok);
                    $('.tampil-foto').html(`<img src="{{ Storage::url('/') }}${response.image}" width="200">`);

                })
                .fail((errors) => {
                    toastr.error('Tidak Dapat Menampilkan Data!', {
                        fadeAway: 1000
                    });
                });
        }

        function deleteData(url) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post(url, {
                            '_token': $('[name=csrf-token]').attr('content'),
                            '_method': 'delete'
                        })
                        .done((response) => {
                            toastr.success('Data Berhasil Dihapus!', {
                                fadeAway: 1000
                            });
                            table.ajax.reload();
                        })
                        .fail((errors) => {
                            toastr.error('Tidak Dapat Menghapus Data!', {
                                fadeAway: 1000
                            });
                        });
                }
            })
        }
    </script>
@endpush
