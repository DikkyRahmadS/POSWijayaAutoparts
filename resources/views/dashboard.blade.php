@extends('layouts/master')

@section('title', 'Dashboard')

@section('content')
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Row-->
        <div class="row gy-5 g-xl-8 ">
            <!--begin::Col-->
            <div class="col-xl-12 ">
                <!--begin::Mixed Widget 2-->
                @if (auth()->user()->role == 1)
                    <div class="card card-xl-stretch">
                        <!--begin::Header-->
                        <div class="card-header border-0 bg-danger py-5">
                            <h1 class="card-title align-items-start flex-column text-white pt-15">
                                <span class="fw-bolder fs-2x mb-3">Hello, {{ Auth::user()->name }}</span>
                            </h1>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body p-0 pb-10">
                            <!--begin::Chart-->
                            <div class="card-rounded-bottom bg-danger" data-kt-color="danger" style="height: 150px"></div>
                            <!--end::Chart-->
                            <!--begin::Stats-->
                            <div class="card-p mt-n20 position-relative">
                                <!--begin::Row-->
                                <div class="row g-0">
                                    <!--begin::Col-->
                                    <div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                                        <div class="row">
                                            <div class="col">
                                                <h1 class="text-warning fw-bold fs-20 mt-6">{{ $kategori }}</h1>
                                            </div>
                                            <div class="col">
                                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect x="8" y="9" width="3" height="10"
                                                            rx="1.5" fill="black" />
                                                        <rect opacity="0.5" x="13" y="5" width="3"
                                                            height="14" rx="1.5" fill="black" />
                                                        <rect x="18" y="11" width="3" height="8"
                                                            rx="1.5" fill="black" />
                                                        <rect x="3" y="13" width="3" height="6"
                                                            rx="1.5" fill="black" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                        <!--end::Svg Icon-->
                                        <a href="#" class="text-warning fw-bold fs-6">Kategori</a>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col bg-light-danger px-6 py-8 rounded-2 me-7 mb-7">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                                        <div class="row">
                                            <div class="col">
                                                <h1 class="text-danger fw-bold fs-20 mt-6">{{ $produk }}</h1>
                                            </div>
                                            <div class="col">
                                                <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect x="8" y="9" width="3" height="10"
                                                            rx="1.5" fill="black" />
                                                        <rect opacity="0.5" x="13" y="5" width="3"
                                                            height="14" rx="1.5" fill="black" />
                                                        <rect x="18" y="11" width="3" height="8"
                                                            rx="1.5" fill="black" />
                                                        <rect x="3" y="13" width="3" height="6"
                                                            rx="1.5" fill="black" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                        <!--end::Svg Icon-->
                                        <a href="#" class="text-danger fw-bold fs-6">Produk</a>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col bg-light-success px-6 py-8 rounded-2 me-7 mb-7">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                                        <div class="row">
                                            <div class="col">
                                                <h1 class="text-success fw-bold fs-20 mt-6">{{ $user }}</h1>
                                            </div>
                                            <div class="col">
                                                <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect x="8" y="9" width="3"
                                                            height="10" rx="1.5" fill="black" />
                                                        <rect opacity="0.5" x="13" y="5"
                                                            width="3" height="14" rx="1.5"
                                                            fill="black" />
                                                        <rect x="18" y="11" width="3"
                                                            height="8" rx="1.5" fill="black" />
                                                        <rect x="3" y="13" width="3"
                                                            height="6" rx="1.5" fill="black" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                        <!--end::Svg Icon-->
                                        <a href="#" class="text-success fw-bold fs-6">Pengguna</a>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col bg-light-primary px-6 py-8 rounded-2 me-7 mb-7">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                                        <div class="row">
                                            <div class="col">
                                                <h1 class="text-primary fw-bold fs-20 mt-6">{{ $supplier }}</h1>
                                            </div>
                                            <div class="col">
                                                <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect x="8" y="9" width="3"
                                                            height="10" rx="1.5" fill="black" />
                                                        <rect opacity="0.5" x="13" y="5"
                                                            width="3" height="14" rx="1.5"
                                                            fill="black" />
                                                        <rect x="18" y="11" width="3"
                                                            height="8" rx="1.5" fill="black" />
                                                        <rect x="3" y="13" width="3"
                                                            height="6" rx="1.5" fill="black" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                        <!--end::Svg Icon-->
                                        <a href="#" class="text-primary fw-bold fs-6">Supplier</a>
                                    </div>
                                    <!--end::Col-->


                                </div>
                                <!--end::Row-->
                                <!--begin::Body-->

                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 2-->
                @endif
            </div>
            <!--end::Col-->
            <!--begin::Col-->

            <!--end::Col-->
        </div>
        <div class="row g-5 g-xl-10 mb-xl-10">
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                <!--begin::Card widget 4-->
                <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <div class="card-title d-flex flex-column">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">{{ $total_produk }}</span>
                                <!--end::Amount-->
                                {{-- <!--begin::Badge-->
                                <span class="badge badge-success fs-base">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                    <span class="svg-icon svg-icon-5 svg-icon-white ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="13" y="6" width="13"
                                                height="2" rx="1" transform="rotate(90 13 6)"
                                                fill="black" />
                                            <path
                                                d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->2.2%
                                </span>
                                <!--end::Badge--> --}}
                            </div>
                            <!--end::Info-->
                            <!--begin::Subtitle-->
                            <span class="text-gray-400 pt-1 fw-bold fs-6">Produk Terjual</span>
                            <!--end::Subtitle-->
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-2 pb-4 d-flex align-items-center">
                        <!--begin::Chart-->
                        <div class="d-flex flex-center me-5 pt-2">
                            <div id="kt_card_widget_4_chart" style="min-width: 70px; min-height: 70px" data-kt-size="70"
                                data-kt-line="11"></div>
                        </div>
                        <!--end::Chart-->
                        <!--begin::Labels-->
                        <div class="d-flex flex-column content-justify-center w-100">
                            <!--begin::Label-->
                            <div class="d-flex fs-6 fw-bold align-items-center">
                                <!--begin::Bullet-->
                                <div class="bullet w-8px h-6px rounded-2 bg-danger me-3"></div>
                                <!--end::Bullet-->
                                <!--begin::Label-->
                                <div class="text-gray-500 flex-grow-1 me-4">Shoes</div>
                                <!--end::Label-->
                                <!--begin::Stats-->
                                <div class="fw-boldest text-gray-700 text-xxl-end">7,660</div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Label-->
                            <!--begin::Label-->
                            <div class="d-flex fs-6 fw-bold align-items-center my-3">
                                <!--begin::Bullet-->
                                <div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                                <!--end::Bullet-->
                                <!--begin::Label-->
                                <div class="text-gray-500 flex-grow-1 me-4">Gaming</div>
                                <!--end::Label-->
                                <!--begin::Stats-->
                                <div class="fw-boldest text-gray-700 text-xxl-end">2,820</div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Label-->
                            <!--begin::Label-->
                            <div class="d-flex fs-6 fw-bold align-items-center">
                                <!--begin::Bullet-->
                                <div class="bullet w-8px h-6px rounded-2 me-3" style="background-color: #E4E6EF"></div>
                                <!--end::Bullet-->
                                <!--begin::Label-->
                                <div class="text-gray-500 flex-grow-1 me-4">Others</div>
                                <!--end::Label-->
                                <!--begin::Stats-->
                                <div class="fw-boldest text-gray-700 text-xxl-end">45,257</div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Labels-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card widget 4-->
                <!--begin::Card widget 5-->
                <div class="card card-flush h-md-50 mb-xl-10">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <div class="card-title d-flex flex-column">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">{{ $total_transaksi }}</span>
                                <!--end::Amount-->
                                {{-- <!--begin::Badge-->
                                <span class="badge badge-danger fs-base">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                    <span class="svg-icon svg-icon-5 svg-icon-white ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="11" y="18" width="13"
                                                height="2" rx="1" transform="rotate(-90 11 18)"
                                                fill="black" />
                                            <path
                                                d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->2.2%
                                </span>
                                <!--end::Badge--> --}}
                            </div>
                            <!--end::Info-->
                            <!--begin::Subtitle-->
                            <span class="text-gray-400 pt-1 fw-bold fs-6">Transaksi Penjualan Bulan Ini</span>
                            <!--end::Subtitle-->
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Card body-->
                    <div class="card-body d-flex align-items-end pt-0">
                        {{-- <!--begin::Progress-->
                        <div class="d-flex align-items-center flex-column mt-3 w-100">
                            <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                <span class="fw-boldest fs-6 text-dark">1,048 to Goal</span>
                                <span class="fw-bolder fs-6 text-gray-400">62%</span>
                            </div>
                            <div class="h-8px mx-3 w-100 bg-light-success rounded">
                                <div class="bg-success rounded h-8px" role="progressbar" style="width: 62%;"
                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <!--end::Progress--> --}}
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card widget 5-->
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                <!--begin::Card widget 6-->
                <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <div class="card-title d-flex flex-column">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <!--begin::Amount-->
                                <span class="fs-4 fw-bold text-gray-400 me-1">Rp</span>
                                <span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">{{ format_uang($mean_penjualan) }}</span>
                                <!--end::Amount-->
                                {{-- <!--begin::Badge-->
                                <span class="badge badge-success fs-base">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                    <span class="svg-icon svg-icon-5 svg-icon-white ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="13" y="6" width="13"
                                                height="2" rx="1" transform="rotate(90 13 6)"
                                                fill="black" />
                                            <path
                                                d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->2.6%
                                </span>
                                <!--end::Badge--> --}}
                            </div>
                            <!--end::Info-->
                            <!--begin::Subtitle-->
                            <span class="text-gray-400 pt-1 fw-bold fs-6">Rata-Rata Penjualan Tiap Minggu</span>
                            <!--end::Subtitle-->
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Card body-->
                    <div class="card-body d-flex align-items-end px-0 pb-0">
                        <!--begin::Chart-->
                        <div id="kt_card_widget_6_chart" class="w-100" style="height: 80px"></div>
                        <!--end::Chart-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card widget 6-->
            </div>
            
            <!--begin::Col-->
            <div class="col-lg-12 col-xl-12 col-xxl-6 mb-5 mb-xl-0">
                <!--begin::Chart widget 3-->
                <div class="card card-flush overflow-hidden h-md-100">
                    <!--begin::Header-->
                    <div class="card-header py-5">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder text-dark">Pendapatan</span>
                            <span class="text-gray-400 mt-1 fw-bold fs-6">Tahun {{ date('Y') }}</span>
                        </h3>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Card body-->
                    <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                        <!--begin::Statistics-->
                        <div class="px-9 mb-5">
                            <!--begin::Statistics-->
                            <div class="d-flex mb-2">
                                <span class="fs-4 fw-bold text-gray-400 me-1">Rp</span>
                                <span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2">{{ format_uang($total_pendapatan) }}</span>
                            </div>
                            <!--end::Statistics-->
                            
                        </div>
                        <!--end::Statistics-->
                        <!--begin::Chart-->



                        <div id="container">
                            <script src="https://code.highcharts.com/highcharts.js"></script>
                            <script type="text/javascript">
                                var pendapatan = {{ json_encode($pendapatan) }};
                                Highcharts.chart('container', {
                                    title: {
                                        text: 'Pendapatan Sepanjang Tahun'
                                    },
                                    xAxis: {
                                        categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                                            'October', 'November', 'December'
                                        ]
                                    },
                                    yAxis: {
                                        title: {
                                            text: 'Jumlah Pendapatan'
                                        }
                                    },
                                    legend: {
                                        layout: 'vertical',
                                        align: 'right',
                                        verticalAlign: 'middle'
                                    },
                                    plotOptions: {
                                        series: {
                                            allowPointSelect: true
                                        }
                                    },
                                    series: [{
                                        name: 'Pendapatan',
                                        data: pendapatan
                                    }],
                                    responsive: {
                                        rules: [{
                                            condition: {
                                                maxWidth: 500
                                            },
                                            chartOptions: {
                                                legend: {
                                                    layout: 'horizontal',
                                                    align: 'center',
                                                    verticalAlign: 'bottom'
                                                }
                                            }
                                        }]
                                    }
                                });
                            </script>
                        </div>
                        <!--end::Chart-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Chart widget 3-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Modals-->
    </div>
@endsection
