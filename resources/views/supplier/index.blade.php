@extends('layouts.master')
@section('menu', 'Menu')
@section('title', 'Daftar Supplier')
@section('content')

    <div class="card card-flush">
        <!--begin::Card header-->
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <!--begin::Card title-->
            <div class="card-title">
                <button onclick="addForm('{{ route('supplier.store') }}')" class="btn btn-primary"><i
                        class="fa fa-plus-circle"></i> Tambah
                    Supplier</button>
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
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="suppliertable">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="w-10px "> No </th>
                        <th class="w-15px">Nama Supplier</th>
                        <th class="w-15px">Nomor Telepon</th>
                        <th class="w-15px">Alamat</th>
                        <th class=" w-70px text-end"></th>
                    </tr>
                    <!--end::Table row-->
                </thead>
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
        @includeIf('supplier.form');
    </div>
@endsection

@push('scripts')
    <script>
        let table;

        $(function() {
            table = $('#suppliertable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('supplier.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'no_hp',
                        sortable: false
                    },
                    {
                        data: 'alamat'
                    },
                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false
                    },
                ]
            });

            $('#modal-supplier').validator().on('submit', function(e) {
                if (!e.preventDefault()) {
                    $.post($('#modal-supplier form').attr('action'), $('#modal-supplier form').serialize())
                        .done((response) => {
                            $('#modal-supplier').modal('hide');
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Data Tersimpan',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            table.ajax.reload();
                        })
                        .fail((errors) => {
                            alert('Tidak dapat menyimpan data');
                            return;
                        });
                }
            });
        });

        function addForm(url) {
            $('#modal-supplier').modal('show');
            $('#modal-supplier .modal-title').text('Tambah Supplier');

            $('#modal-supplier form')[0].reset();
            $('#modal-supplier form').attr('action', url);
            $('#modal-supplier [name=_method]').val('post');
            $('#modal-supplier [name=nama]').focus();
        }

        function editForm(url) {
            $('#modal-supplier').modal('show');
            $('#modal-supplier .modal-title').text('Edit Supplier');

            $('#modal-supplier form')[0].reset();
            $('#modal-supplier form').attr('action', url);
            $('#modal-supplier [name=_method]').val('put');
            $('#modal-supplier [name=nama]').focus();

            $.get(url)
                .done((response) => {
                    $('#modal-supplier [name=nama]').val(response.nama);
                    $('#modal-supplier [name=no_hp]').val(response.no_hp);
                    $('#modal-supplier [name=alamat]').val(response.alamat);
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
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Data Berhasil Dihapus',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            table.ajax.reload();
                        })
                        .fail((errors) => {
                            alert('Tidak dapat menghapus data');
                            return;
                        });
                }
            })
        }
    </script>
@endpush
