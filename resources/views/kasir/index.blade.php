@extends('layouts.master')
@section('menu', 'Menu')
@section('title', 'Daftar Produk')
@push('css')
    <style>
        .table-penjualan tbody tr:last-child {
            display: none;
        }

        .no-border {
            border: 0;
            box-shadow: none;
            /* You may want to include this as bootstrap applies these styles too */
        }
    </style>
@endpush
@section('content')
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-xl-row">
            <!--begin::Content-->
            <div class="d-flex flex-row-fluid me-xl-9 mb-10 mb-xl-0">

                <!--begin::Pos food-->
                <div class="card card-flush card-p-0 bg-transparent border-0 ">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Nav-->
                        <ul class="nav nav-pills d-flex  nav-pills-custom ">

                            {{-- kategori --}}
                            {{-- @foreach ($kategoris as $kategori)
                                <li class="nav-item mb-3 me-0">
                                    <!--begin::Nav link-->
                                    <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg show active"
                                        data-bs-toggle="pill" href="#kt_pos_food_content_1"
                                        style="width: 138px;height: 180px">
                                        <!--begin::Icon-->
                                        <div class="nav-icon mb-3">
                                            <!--begin::Food icon-->
                                            <img src="/metronic8/demo1/assets/media/svg/food-icons/spaghetti.svg"
                                                class="w-50px" alt="" />
                                            <!--end::Food icon-->
                                        </div>
                                        <!--end::Icon-->

                                        <!--begin::Info-->
                                        <div class="">
                                            <span
                                                class="text-gray-800 fw-bold fs-2 d-block">{{ $kategori->nama_kategori }}</span>
                                            <span class="text-gray-400 fw-semibold fs-7">8
                                                Options</span>
                                        </div>
                                        <!--end::Info-->
                                    </a>
                                    <!--end::Nav link-->
                                </li>
                            @endforeach --}}

                            {{-- end kategori --}}


                            <!--end::Item-->
                        </ul>
                        <!--end::Nav-->

                        <!--begin::Tab Content-->
                        <div class="tab-content">


                            <!--begin::Tap pane-->

                            <form class="form-produk">
                                @csrf
                                <input type="hidden" name="penjualan_id" value="{{ $id_penjualan }}">
                                <input type="hidden" name="produk_id" id="produk_id">

                                <div class="tab-pane fade show active" id="kt_pos_food_content_1">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-wrap d-grid gap-5 gap-xxl-9">

                                        @foreach ($produks as $produk)
                                            <!--begin::Card-->
                                            <div class="card card-flush flex-row-fluid p-6 pb-5 mw-100">
                                                <!--begin::Body-->
                                                <div class="card-body text-center">
                                                    <!--begin::Food img-->
                                                    <img src="{{ Storage::url("$produk->image") }}"
                                                        class="rounded-3 mb-4 w-150px h-150px w-xxl-200px h-xxl-200px"
                                                        alt="" />
                                                    <!--end::Food img-->

                                                    <!--begin::Info-->
                                                    <div class="mb-2">
                                                        <!--begin::Title-->
                                                        <div class="text-center">
                                                            <span
                                                                class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 fs-xl-1">{{ $produk->nama_produk }}</span>

                                                            <span
                                                                class="text-gray-400 fw-semibold d-block fs-6 mt-n1">{{ $produk->merk }}</span>
                                                        </div>
                                                        <!--end::Title-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Total-->
                                                    <span class="text-success text-end fw-bold fs-1 ">Rp.
                                                        {{ format_uang($produk->harga_jual) }}</span><br>
                                                    <button class="btn btn-primary mt-5"
                                                        onclick="pilihProduk('{{ $produk->id }}')"><i
                                                            class="fa fa-plus-circle"></i>Pilih Produk</button>

                                                    <!--end::Total-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Card-->
                                        @endforeach
                            </form>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Tap pane-->
                </div>
                <!--end::Tab Content-->
            </div>
            <!--end: Card Body-->
        </div>
        <!--end::Pos food-->
    </div>
    <!--end::Content-->

    <!--begin::Sidebar-->
    <div class="flex-row-auto w-xl-500px">

        <!--begin::Pos order-->
        <div class="card card-flush bg-body " id="kt_pos_form">
            <!--begin::Header-->
            <div class="card-header pt-5">
                <h3 class="card-title fw-bold text-gray-800 fs-2qx">Keranjang</h3>
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body pt-0">
                <!--begin::Table container-->
                <div class="table-responsive mb-8">
                    <!--begin::Table-->
                    <table class="table align-middle gs-0 gy-4 my-0 table-penjualan">
                        <!--begin::Table head-->
                        <thead>
                            <tr>
                                <th class="w-100px"></th>
                                <th class="w-60px"></th>
                                <th class="w-110px"></th>
                                <th class="w-30px"></th>
                            </tr>
                        </thead>
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Table container-->

                <!--begin::Summary-->
                <!--begin::Content-->
                <form action="{{ route('penjualan.simpan') }}" class="form-penjualan" method="POST">
                    @csrf
                    <div class="d-flex flex-stack bg-success rounded-3 p-6 mb-11">
                        <input type="hidden" name="penjualan_id" value="{{ $id_penjualan }}">
                        <input type="hidden" name="total" id="total">
                        <input type="hidden" name="total_item" id="total_item">
                        <input type="hidden" name="bayar" id="bayar">
                        <div class="fs-5 fw-bold text-white">
                            <span class="d-block mb-1 mt-3">Subtotal</span>
                            <span class="d-block mb-5">Diskon</span>
                            <span class="d-block fs-2qx lh-1 mb-8">Total</span>
                            <br>
                            <span class="d-block mb-1">Diterima</span>

                            <span class="d-block mb-5">Kembali</span>
                        </div>
                        <!--end::Content-->
                        <!--begin::Content-->
                        <div class="fs-6 fw-bold text-white text-end">
                            <div class="col-md-10 offset-md-2">
                                <input type="text" id="totalrp"
                                    class="form-control bg-success fs-6 fw-bold text-white p-1 mt-0 no-border text-end"
                                    readonly>
                                <input type="number" name="diskon" id="diskon"
                                    class="form-control bg-success fs-6 fw-bold text-white p-1 text-end" value="0">
                                <input type="text" id="bayarrp"
                                    class="form-control bg-success fs-2qx  fw-bold text-white p-1 mb-10 no-border text-end"
                                    readonly>
                                <input type="number" id="diterima"
                                    class="form-control bg-success fs-6 fw-bold text-white p-1 text-end" name="diterima"
                                    value="{{ $penjualan->diterima ?? 0 }}">
                                <input type="text" id="kembali" name="kembali"
                                    class="form-control bg-success fs-6 fw-bold text-white p-1 no-border text-end"
                                    value="0" readonly>
                            </div>
                        </div>

                    </div>
                    <!--end::Content-->
                </form>



                <!--end::Summary-->

                <!--begin::Payment Method-->
                <div class="m-0">
                    <!--begin::Actions-->
                    <button type="submit" class="btn btn-primary fs-1 w-100 py-4 btn-simpan">Simpan Transaksi</button>
                    <!--end::Actions-->
                </div>
                <!--end::Payment Method-->
            </div>
            <!--end: Card Body-->
        </div>
        <!--end::Pos order-->
    </div>
    <!--end::Sidebar-->
    </div>
    <!--end::Layout-->
    </div>
    <!--end::Content container-->
@endsection

@push('scripts')
    <script>
        let table;

        $(function() {
            $('#kt_body').attr('data-kt-aside-minimize', 'on');


            table = $('.table-penjualan').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    autoWidth: false,
                    ajax: {
                        url: '{{ route('transaksi.data', $id_penjualan) }}',
                    },
                    columns: [{
                            data: 'nama_produk'
                        },
                        {
                            data: 'jumlah'
                        },
                        {
                            data: 'subtotal'
                        },
                        {
                            data: 'aksi',
                            searchable: false,
                            sortable: false
                        },
                    ],
                    dom: 'Brt',
                    bSort: false,
                    paginate: false
                })
                .on('draw.dt', function() {
                    loadForm($('#diskon').val());
                    setTimeout(() => {
                        $('#diterima').trigger('input');
                    }, 300);
                });

            $(document).on('input', '.quantity', function() {
                let id = $(this).data('id');
                let jumlah = parseInt($(this).val());

                if (jumlah < 1) {
                    $(this).val(1);
                    alert('Jumlah tidak boleh kurang dari 1');
                    return;
                }
                if (jumlah > 10000) {
                    $(this).val(10000);
                    alert('Jumlah tidak boleh lebih dari 10000');
                    return;
                }

                $.post(`{{ url('/transaksi') }}/${id}`, {
                        '_token': $('[name=csrf-token]').attr('content'),
                        '_method': 'put',
                        'jumlah': jumlah
                    })
                    .done(response => {
                        $(this).on('mouseout', function() {
                            table.ajax.reload(() => loadForm($('#diskon').val()));
                        });
                    })
                    .fail(errors => {
                        alert('Tidak dapat menyimpan data');
                        return;
                    });
            });

            $(document).on('input', '#diskon', function() {
                if ($(this).val() == "") {
                    $(this).val(0).select();
                }

                loadForm($(this).val());
            });

            $('#diterima').on('input', function() {
                if ($(this).val() == "") {
                    $(this).val(0).select();
                }

                loadForm($('#diskon').val(), $(this).val());
            }).focus(function() {
                $(this).select();
            });

            $('.btn-simpan').on('click', function() {
                $('.form-penjualan').submit();
            });
        });

        function pilihProduk(id) {
            $('#produk_id').val(id);
            tambahProduk();
        }


        function tambahProduk() {
            $.post('{{ route('transaksi.store') }}', $('.form-produk').serialize())
                .done(response => {
                    table.ajax.reload(() => loadForm($('#diskon').val()));
                })
                .fail(errors => {
                    alert('Tidak dapat menyimpan data');
                    return;
                });
        }

        function deleteData(url) {
            if (confirm('Yakin ingin menghapus data terpilih?')) {
                $.post(url, {
                        '_token': $('[name=csrf-token]').attr('content'),
                        '_method': 'delete'
                    })
                    .done((response) => {
                        table.ajax.reload(() => loadForm($('#diskon').val()));
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menghapus data');
                        return;
                    });
            }
        }

        function loadForm(diskon = 0, diterima = 0) {
            $('#total').val($('.total').text());
            $('#total_item').val($('.total_item').text());

            $.get(`{{ url('/transaksi/loadform') }}/${diskon}/${$('.total').text()}/${diterima}`)
                .done(response => {
                    $('#totalrp').val('Rp. ' + response.totalrp);
                    $('#bayarrp').val('Rp. ' + response.bayarrp);
                    $('#bayar').val(response.bayar);
                    $('.tampil-bayar').text('Bayar: Rp. ' + response.bayarrp);
                    $('.tampil-terbilang').text(response.terbilang);

                    $('#kembali').val('Rp.' + response.kembalirp);
                    if ($('#diterima').val() != 0) {
                        $('.tampil-bayar').text('Kembali: Rp. ' + response.kembalirp);
                        $('.tampil-terbilang').text(response.kembali_terbilang);
                    }
                })
                .fail(errors => {
                    alert('Tidak dapat menampilkan data');
                    return;
                })
        }
    </script>
@endpush
