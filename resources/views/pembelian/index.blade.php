@extends('layouts.master')
@section('menu', 'Menu')
@section('title', 'Pembelian Produk')
@section('content')

    <div class="card card-flush">
        <!--begin::Card header-->
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <!--begin::Card title-->
            <div class="card-title">
                {{-- @empty(!session('id'))
                    <a href="{{ route('pembeliandetail.index') }}" class="btn btn-info"> Transaksi Aktif</a>
                @endempty --}}
                <button class="btn btn-primary" onclick="addForm()"><i class="fa fa-plus-circle"></i> Tambah
                    Transaksi</button>

            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Add customer-->

                <!--end::Add customer-->

            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="table-pembelian">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2 "> No </th>
                        <th class="w-15px">Tanggal</th>
                        <th class="w-15px">Supplier</th>
                        <th class="w-15px">Total Item</th>
                        <th class="w-15px">Total Harga</th>
                        <th class="w-15px">Diskon</th>
                        <th class="w-15px">Total Bayar</th>
                        <th class=" w-70px text-end"></th>
                    </tr>
                    <!--end::Table row-->
                </thead>
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
        @include('pembelian.detail')
        @include('pembelian.supplier')

    </div>
@endsection
@push('scripts')
    <script>
        let table, table1;

        $(function() {
            table = $('#table-pembelian').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('pembelian.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'tanggal'
                    },
                    {
                        data: 'supplier'
                    },
                    {
                        data: 'total_item'
                    },
                    {
                        data: 'total_harga'
                    },
                    {
                        data: 'diskon'
                    },
                    {
                        data: 'bayar'
                    },
                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false
                    },
                ]
            });

            $('#table-supplier').DataTable();
            table1 = $('#table-detail').DataTable({
                processing: true,
                bSort: false,
                dom: 'Brt',
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'kode_produk'
                    },
                    {
                        data: 'nama_produk'
                    },
                    {
                        data: 'harga_beli'
                    },
                    {
                        data: 'jumlah'
                    },
                    {
                        data: 'subtotal'
                    },
                ]
            })
        });

        function addForm() {
            $('#supplierModal').modal('show');
        }

        function showDetail(url) {
            $('#detailModal').modal('show');

            table1.ajax.url(url);
            table1.ajax.reload();
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
