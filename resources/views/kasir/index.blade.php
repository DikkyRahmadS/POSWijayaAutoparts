@extends('layouts.master')
@section('menu', 'Menu')
@section('title', 'Daftar Produk')
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
                                            <div class="card card-flush flex-row-fluid p-3 pb-5 mw-70">
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

                                                    <a href="#" class="text-success text-end fw-bold fs-1"
                                                        onclick="pilihProduk('{{ $produk->id }}')">
                                                        <button class="btn btn-primary mt-5">Tambah ke Cart</button>
                                                    </a>
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
    <div class="flex-row-auto w-xl-450px">

        <!--begin::Pos order-->
        <div class="card card-flush bg-body " id="kt_pos_form">
            <!--begin::Header-->
            <div class="card-header pt-5">
                <h3 class="card-title fw-bold text-gray-800 fs-2qx">Cart</h3>

                {{-- <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-light-primary fs-4 fw-bold py-4">Clear All</a>
                        </div>
                        <!--end::Toolbar--> --}}
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
                                <th class="w-100px"></th>
                                <th class="w-60px"></th>
                                <th class="w-30px"></th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        {{--
                                <!--begin::Table body-->
                                <tbody>
                                    <tr data-kt-pos-element="item" data-kt-pos-item-price="33">
                                        <td class="pe-0">
                                            <div class="d-flex align-items-center">
                                                <img src="/metronic8/demo1/assets/media/stock/food/img-2.jpg"
                                                    class="w-50px h-50px rounded-3 me-3" alt="" />
                                                <span
                                                    class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6 me-1">T-Bone
                                                    Stake</span>
                                            </div>
                                        </td>

                                        <td class="pe-0">
                                            <!--begin::Dialer-->
                                            <div class="position-relative d-flex align-items-center" data-kt-dialer="true"
                                                data-kt-dialer-min="1" data-kt-dialer-max="10" data-kt-dialer-step="1"
                                                data-kt-dialer-decimals="0">

                                                <!--begin::Decrease control-->
                                                <button type="button"
                                                    class="btn btn-icon btn-sm btn-light btn-icon-gray-400"
                                                    data-kt-dialer-control="decrease">
                                                    <i class="ki-duotone ki-minus fs-3x"></i>
                                                </button>
                                                <!--end::Decrease control-->

                                                <!--begin::Input control-->
                                                <input type="text"
                                                    class="form-control border-0 text-center px-0 fs-3 fw-bold text-gray-800 w-30px"
                                                    data-kt-dialer-control="input" placeholder="Amount" name="manageBudget"
                                                    readonly value="2" />
                                                <!--end::Input control-->

                                                <!--begin::Increase control-->
                                                <button type="button"
                                                    class="btn btn-icon btn-sm btn-light btn-icon-gray-400"
                                                    data-kt-dialer-control="increase">
                                                    <i class="ki-duotone ki-plus fs-3x"></i>
                                                </button>
                                                <!--end::Increase control-->
                                            </div>
                                            <!--end::Dialer-->
                                        </td>

                                        <td class="text-end">
                                            <span class="fw-bold text-primary fs-2"
                                                data-kt-pos-element="item-total">$66.00</span>
                                        </td>
                                    </tr>
                                    <tr data-kt-pos-element="item" data-kt-pos-item-price="7.5">
                                        <td class="pe-0">
                                            <div class="d-flex align-items-center">
                                                <img src="/metronic8/demo1/assets/media/stock/food/img-9.jpg"
                                                    class="w-50px h-50px rounded-3 me-3" alt="" />
                                                <span
                                                    class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6 me-1">Soup
                                                    of the Day</span>
                                            </div>
                                        </td>

                                        <td class="pe-0">
                                            <!--begin::Dialer-->
                                            <div class="position-relative d-flex align-items-center" data-kt-dialer="true"
                                                data-kt-dialer-min="1" data-kt-dialer-max="10" data-kt-dialer-step="1"
                                                data-kt-dialer-decimals="0">

                                                <!--begin::Decrease control-->
                                                <button type="button"
                                                    class="btn btn-icon btn-sm btn-light btn-icon-gray-400"
                                                    data-kt-dialer-control="decrease">
                                                    <i class="ki-duotone ki-minus fs-3x"></i>
                                                </button>
                                                <!--end::Decrease control-->

                                                <!--begin::Input control-->
                                                <input type="text"
                                                    class="form-control border-0 text-center px-0 fs-3 fw-bold text-gray-800 w-30px"
                                                    data-kt-dialer-control="input" placeholder="Amount" name="manageBudget"
                                                    readonly value="1" />
                                                <!--end::Input control-->

                                                <!--begin::Increase control-->
                                                <button type="button"
                                                    class="btn btn-icon btn-sm btn-light btn-icon-gray-400"
                                                    data-kt-dialer-control="increase">
                                                    <i class="ki-duotone ki-plus fs-3x"></i>
                                                </button>
                                                <!--end::Increase control-->
                                            </div>
                                            <!--end::Dialer-->
                                        </td>

                                        <td class="text-end">
                                            <span class="fw-bold text-primary fs-2"
                                                data-kt-pos-element="item-total">$7.50</span>
                                        </td>
                                    </tr>
                                </tbody>
                                <!--end::Table body--> --}}
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Table container-->

                <!--begin::Summary-->
                <!--begin::Content-->

                {{-- <div class="fs-6 fw-bold text-white">
                        <span class="d-block lh-1 mb-2">Subtotal</span>
                        <span class="d-block mb-2">Diskon</span>
                        <span class="d-block mb-2">Bayar</span>
                        <span class="d-block mb-9">Diterima</span>
                        <span class="d-block fs-2qx lh-1">Total</span>
                        <span class="d-block fs-2qx lh-1">Kembali</span>
                    </div>
                    <!--end::Content-->
                    <!--begin::Content-->
                    <div class="fs-6 fw-bold text-white text-end">
                        <input type="text" id="totalrp" class="form-control text-end" readonly>
                        <span class="d-block mb-2" data-kt-pos-element="discount">-$8.00</span>
                        <span class="d-block mb-9" data-kt-pos-element="tax">$11.20</span>
                        <span class="d-block mb-9">$11.20</span>
                        <span class="d-block fs-2qx lh-1" data-kt-pos-element="grant-total">$93.46</span>
                    </div> --}}
                <form action="{{ route('penjualan.store') }}" class="form-penjualan" method="post">
                    @csrf

                    <div class="d-flex flex-stack bg-success rounded-3 p-6 mb-11">
                        <input type="hidden" name="penjualan_id" value="{{ $id_penjualan }}">
                        <input type="hidden" name="total" id="total">
                        <input type="hidden" name="total_item" id="total_item">
                        <input type="hidden" name="bayar" id="bayar">
                        <div class="fs-6 fw-bold text-white">
                            <span class="d-block lh-1 mb-2">Subtotal</span>
                            <span class="d-block mb-2">Diskon</span>
                            <span class="d-block mb-2">Bayar</span>
                            <span class="d-block mb-9">Diterima</span>
                            <span class="d-block fs-2qx lh-1">Kembali</span>
                        </div>
                        <!--end::Content-->
                        <!--begin::Content-->
                        <div class="fs-6 fw-bold text-white text-end">
                            <input type="text" id="totalrp" class="form-control text-end" readonly>
                            <input type="number" name="diskon" id="diskon" class="form-control" value="0">
                            <input type="text" id="bayarrp" class="form-control" readonly>
                            <input type="number" id="diterima" class="form-control" name="diterima"
                                value="{{ $penjualan->diterima ?? 0 }}">
                            <input type="text" id="kembali" name="kembali" class="form-control" value="0"
                                readonly>
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
            $('body').addClass('sidebar-collapse');


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
                    $('#kode_produk').focus();
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
