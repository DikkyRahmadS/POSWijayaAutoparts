@extends('layouts.master')
@section('menu', 'Kelola Produk')
@section('title', 'Daftar Kategori')
@section('content')

    <div class="card card-flush">
        <!--begin::Card header-->
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <!--begin::Card title-->
            <div class="card-title">
                <button onclick="addForm('{{ route('kategori.store') }}')" class="btn btn-primary"><i
                        class="fa fa-plus-circle"></i> Tambah
                    Kategori</button>
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
            <table class="table align-middle table-row-dashed fs-6 gy-5 " id="kategoritable">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="w-10px">No </th>
                        <th class="w-15px">Nama Kategori</th>
                        <th class=" w-70px text-end"></th>
                    </tr>
                    <!--end::Table row-->
                </thead>
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
        @includeIf('kategori.form')

    </div>
@endsection
@push('scripts')
    <script>
        let table;

        $(function() {
            table = $('#kategoritable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('kategori.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'nama_kategori'
                    },
                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false
                    },
                ]
            });

            $('#modal-kategori').validator().on('submit', function(e) {
                if (!e.preventDefault()) {
                    $.post($('#modal-kategori form').attr('action'), $('#modal-kategori form').serialize())
                        .done((response) => {
                            $('#modal-kategori').modal('hide');
                            toastr.success('Data Berhasil Disimpan!', {
                                fadeAway: 1000
                            });
                            table.ajax.reload();
                        })
                        .fail((errors) => {
                            toastr.error('Data Gagal Disimpan!', {
                                fadeAway: 1000
                            });
                        });
                }
            });
        });

        function addForm(url) {
            $('#modal-kategori').modal('show');
            $('#modal-kategori .modal-title').text('Tambah Kategori');

            $('#modal-kategori form')[0].reset();
            $('#modal-kategori form').attr('action', url);
            $('#modal-kategori [name=_method]').val('post');
            $('#modal-kategori [name=nama_kategori]').focus();
        }

        function editForm(url) {
            $('#modal-kategori').modal('show');
            $('#modal-kategori .modal-title').text('Edit Kategori');

            $('#modal-kategori form')[0].reset();
            $('#modal-kategori form').attr('action', url);
            $('#modal-kategori [name=_method]').val('put');
            $('#modal-kategori [name=nama_kategori]').focus();

            $.get(url)
                .done((response) => {
                    $('#modal-kategori [name=nama_kategori]').val(response.nama_kategori);
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
