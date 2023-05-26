@extends('layouts.master')
@section('menu', 'Menu')
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
                        <th class="min-w-70px">Kode Produk</th>
                        <th class="min-w-70px">Nama Produk</th>
                        <th class="min-w-70px pe-2 ">Kategori </th>
                        <th class="min-w-70px pe-2 ">Berat </th>
                        <th class="min-w-10px">Harga Jual</th>
                        <th class="min-w-10px">Stok</th>
                        <th class="min-w-70px text-end"></th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--begin::Body-->
                <!--begin::Table body-->
                {{-- <tbody class="fw-bold text-gray-600">
                    <?php $i = $datas->firstItem(); ?>

                    @foreach ($datas as $key => $value)
                        <tr>
                            <td style="padding-left:10px">{{ $i }}</td>
                            <td>
                                <!--begin::Badges-->
                                <div class="badge badge-light-success">{{ $value->kode_produk }}</div>
                                <!--end::Badges-->
                            </td>
                            <td>
                                <div class="d-flex">
                                    <!--begin::Thumbnail-->
                                    <div class="symbol symbol-45px me-1 ml-1">
                                        <img src="{{ Storage::url($value->image) }}" alt="" />
                                    </div>
                                    <!--end::Thumbnail-->
                                    <div class="ms-2">
                                        <!--begin::Title-->
                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-category.html"
                                            class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
                                            data-kt-ecommerce-category-filter="category_name">{{ $value->nama_produk }}</a>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7 fw-bolder">{{ $value->merk }}</div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                            </td>
                            <td>{{ $value->kategori->nama_kategori }}</td>
                            <td>{{ $value->berat }}</td>
                            <td>Rp. {{ format_uang($value->harga_jual) }}</td>
                            <td>{{ $value->stok }}</td>
                            <td class="text-end">
                                <a href="javascript:void(0)"
                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $value->id }}">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                    <span class="svg-icon svg-icon-3 editbtn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                fill="currentColor" />
                                            <path
                                                d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>

                                <a href="javascript:void(0)"
                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $value->id }}">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->


                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                fill="currentColor" />
                                            <path opacity="0.5"
                                                d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                fill="currentColor" />
                                            <path opacity="0.5"
                                                d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                            </td>
                            @include('produk.edit')
                            @include('produk.delete')
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                </tbody> --}}
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
                            data: 'kode_produk'
                        },
                        {
                            data: 'nama_produk'
                        },
                        {
                            data: 'nama_kategori'
                        },
                        {
                            data: 'berat'
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
                    $('#modal-produk [name=merk]').val(response.merk);
                    $('#modal-produk [name=berat]').val(response.berat);
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
