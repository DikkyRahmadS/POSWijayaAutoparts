@extends('layouts.master')
@section('menu', 'Menu')
@section('title', 'Daftar Pengguna')
@section('content')

    <div class="card card-flush">
        <!--begin::Card header-->
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <!--begin::Card title-->
            <div class="card-title">
                <button onclick="addForm('{{ route('pengguna.store') }}')" class="btn btn-primary"><i
                        class="fa fa-plus-circle"></i> Tambah
                    Pengguna</button>
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
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="penggunatable">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-10px"> No </th>
                        <th class="min-w-70px"> Nama Pengguna</th>
                        <th class="min-w-70px"> Email </th>
                        <th class="min-w-70px"> Posisi</th>
                        <th class="min-w-70px text-end"></th>
                    </tr>
                    <!--end::Table row-->
                </thead>
            </table>
        </div>
        <!--end::Table container-->
        @includeIf('pengguna.form');
    </div>
@endsection


@push('scripts')
    <script>
        let table;
        $(function() {
            table = $('#penggunatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('pengguna.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'role'
                    },
                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false
                    },
                ]
            });

            $('#modal-pengguna').validator().on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                        url: $('#modal-pengguna form').attr('action'),
                        type: $('#modal-pengguna form').attr('method'),
                        data: new FormData($('#modal-pengguna form')[0]),
                        async: false,
                        processData: false,
                        contentType: false
                    })
                    .done(response => {
                        $('#modal-pengguna').modal('hide');
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

        function addForm(url) {
            $('#modal-pengguna').modal('show');
            $('#modal-pengguna .modal-title').text('Tambah Pengguna');

            $('#modal-pengguna form')[0].reset();
            $('#modal-pengguna form').attr('action', url);
            $('#modal-pengguna [name=_method]').val('post');
            $('#modal-pengguna [name=name]').focus();
            $('.tampil-foto').html(``);
            $('.passtxt').html(``);
        }

        function editForm(url) {
            $('#modal-pengguna').modal('show');
            $('#modal-pengguna .modal-title').text('Edit Pengguna');

            $('#modal-pengguna form')[0].reset();
            $('#modal-pengguna form').attr('action', url);
            $('#modal-pengguna [name=_method]').val('put');
            $('#modal-pengguna [name=name]').focus();

            $.get(url)
                .done((response) => {
                    $('#modal-pengguna [name=name]').val(response.name);
                    $('#modal-pengguna [name=email]').val(response.email);
                    $('#modal-pengguna [name=role]').val(response.role);
                    $('#modal-pengguna [name=password]').val(response.password);
                    $('.tampil-foto').html(`<img src="{{ Storage::url('/') }}${response.image}" width="200">`);
                    $('.passtxt').html(`* Kosongkan jika tidak diubah`);
                })
                .fail((errors) => {
                    alert('Tidak dapat menampilkan data');
                    return;
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
                            toastr.error('Data Gagal Dihapus!', {
                                fadeAway: 1000
                            });
                        });
                }
            })
        }
    </script>
@endpush
