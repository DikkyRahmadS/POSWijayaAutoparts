@extends('layouts/master')

@section('title', 'Dashboard')

@section('content')
    @if (auth()->user()->role == 1)
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            <div class="row gy-5 g-xl-8 ">
                <!--begin::Col-->
                <div class="col-xl-12 mb-5 ">
                    <!--begin::Mixed Widget 2-->
                    <div class="card card-xl-stretch">
                        <!--begin::Header-->
                        <div class="card-header border-0 bg-danger py-5">
                            <h1 class="card-title align-items-start flex-column text-white pt-15">
                                <span class="fw-bolder fs-2x mb-3">Selamat Datang, {{ Auth::user()->name }}</span>
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
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <!--end::Col-->
            </div>

            <div class="row g-5 g-xl-10 mb-xl-10">
                <div class="col-lg-6 mb-5 mb-xl-0">
                    <!--begin::Card widget 4-->
                    <div class="card card-flush overflow-hidden h-md-100">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Amount-->
                                    <span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">{{ $total_produk[0] }}</span>
                                    <!--end::Amount-->
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
                        <div class="card-body d-flex justify-content-between flex-column pb-1 px-5">
                            <!--begin::Chart-->
                            <div id="grafik-produk"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 4-->
                </div>

                <div class="col-lg-6 mb-5 mb-xl-0">
                    <!--begin::Card widget 6-->
                    <div class="card card-flush overflow-hidden h-md-100">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Amount-->
                                    <span class="fs-4 fw-bold text-gray-400 me-1">Rp</span>
                                    <span
                                        class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">{{ format_uang($mean_penjualan[0]->mean) }}</span>
                                    <!--end::Amount-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Subtitle-->
                                <span class="text-gray-400 pt-1 fw-bold fs-6">Rata-Rata Penjualan Tiap Hari</span>
                                <span class="text-gray-400 pt-1 fw-bold fs-6">Minggu Ini</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex justify-content-between flex-column pb-1 px-5">
                            <!--begin::Chart-->

                            <div id="grafik-penjualan-mingguan"></div>

                            <!--end::Chart-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 6-->
                </div>

                <!--begin::Col-->
                <div class="col-lg-12 col-xl-12 mb-5 mb-xl-0">
                    <!--begin::Chart widget 3-->
                    <div class="card card-flush overflow-hidden h-md-100">
                        <!--begin::Header-->
                        <div class="card-header pt-5 pt-0">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">Total Penjualan</span>
                                <span class="text-gray-400 mt-1 fw-bold fs-6">Tahun {{ date('Y') }}</span>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex justify-content-between flex-column pb-1 px-5">
                            <!--begin::Statistics-->
                            <div class="px-9 mb-5">
                                <!--begin::Statistics-->
                                <div class="d-flex mb-2">
                                    <span class="fs-4 fw-bold text-gray-400 me-1">Rp</span>
                                    <span
                                        class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2">{{ format_uang($total_pendapatan) }}</span>
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Statistics-->
                            <!--begin::Chart-->
                            <div id="grafik-penjualan-tahunan"></div>
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
    @endif

    @if (auth()->user()->role == 0)
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            <div class="row gy-5 g-xl-8 ">
                <!--begin::Col-->
                <div class="col-xl-12 mb-5 ">
                    <!--begin::Mixed Widget 2-->
                    <div class="card card-xl-stretch">
                        <!--begin::Header-->
                        <div class="card-header border-0 bg-danger py-5">
                            <h1 class="card-title align-items-start flex-column text-white pt-15">
                                <span class="fw-bolder fs-2x mb-3">Selamat Datang, {{ Auth::user()->name }}</span>
                                <span class="fw-bolder fs-2x mb-3">Anda login sebagai KASIR</span>
                                <a href="{{ route('transaksi.baru') }}" class="btn btn-success btn-lg">Transaksi Baru</a>
                                <br>
                            </h1>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body p-0 pb-10">
                            <!--begin::Chart-->
                            <div class="card-rounded-bottom bg-danger" data-kt-color="danger" style="height: 50px">
                            </div>
                            <!--end::Chart-->
                            <!--begin::Stats-->
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 2-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <!--end::Col-->
            </div>
        </div>
    @endif

@endsection

@push('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript">
        //mengubah simbol numerik chart
        Highcharts.setOptions({
            lang: {
                numericSymbols: ['Jt'],
                numericSymbolMagnitude: 1000000
            }
        });
        //untuk penjualan bulanan dalam tahun ini
        var penjualan_perbulan = <?php
        $arr_items = (array) json_decode($pendapatan);
        $rows = count($arr_items);
        $arr_penjualan_perbulan = [];
        for ($i = 0; $i < 12; $i++) {
            $isFound = false;
            for ($j = 0; $j < $rows; $j++) {
                if ($arr_items[$j]->bulan === $i) {
                    array_push($arr_penjualan_perbulan, $arr_items[$j]->pendapatan);
                    $isFound = true;
                    break;
                }
            }
            if (!$isFound) {
                array_push($arr_penjualan_perbulan, 0);
            }
        }
        echo json_encode($arr_penjualan_perbulan);
        ?>;
        Highcharts.chart('grafik-penjualan-tahunan', {
            title: {
                text: 'Grafik Penjualan Dalam Setahun'
            },
            chart: {
                type: 'spline'
            },
            xAxis: {
                categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ]
            },
            yAxis: {
                title: {
                    text: 'Nominal Penjualan Bulanan'
                }
            },
            chart: {
                type: 'spline'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'Nominal Penjualan',
                data: penjualan_perbulan
            }]
        });

        //untuk grafik penjualan perhari dalam minggu ini
        var penjualan_perhari = <?php
        $arr_data = (array) json_decode($penjualan_perhari);
        $hari = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $rows = count($arr_data);
        $arr_penjualan_perhari = [];
        for ($i = 0; $i < 7; $i++) {
            $isFound = false;
            for ($j = 0; $j < $rows; $j++) {
                if ($arr_data[$j]->hari === $hari[$i]) {
                    array_push($arr_penjualan_perhari, $arr_data[$j]->pendapatan);
                    $isFound = true;
                    break;
                }
            }
            if (!$isFound) {
                array_push($arr_penjualan_perhari, 0);
            }
        }
        echo json_encode($arr_penjualan_perhari);
        ?>;
        Highcharts.chart('grafik-penjualan-mingguan', {
            title: {
                text: 'Grafik Penjualan Minggu Ini'
            },
            subtitle: {
                text: '<?php echo date('d F Y'); ?>'
            },
            chart: {
                type: 'spline'
            },
            xAxis: {
                categories: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']
            },
            yAxis: {
                title: {
                    text: 'Nominal Penjualan Harian'
                }
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'Nominal Penjualan',
                data: penjualan_perhari
            }]
        });

        //grafik untuk produk terjual
        Highcharts.chart('grafik-produk', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Grafik Produk Terjual',
                align: 'center'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            plotOptions: {
                series: {
                    borderRadius: 5,
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: {point.y}'
                    }
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> pcs<br/>'
            },
            series: [{
                name: 'Kategori',
                colorByPoint: true,
                data: [
                    <?php
                    $data = (array) json_decode($produk_kategori);
                    for ($i = 0; $i < count($data); $i++) {
                        echo '{';
                        echo "name: '" . $data[$i]->name . "', ";
                        echo 'y: ' . $data[$i]->y . ', ';
                        echo "drilldown: '" . $data[$i]->name . "'";
                        echo '},';
                    }
                    ?>
                ]
            }],
            drilldown: {
                series: [
                    <?php
                    $items = (array) json_decode($drilldown_produk);
                    for ($i = 0; $i < count($data); $i++) {
                        echo '{';
                        echo "name: '" . $data[$i]->name . "', ";
                        echo "id: '" . $data[$i]->name . "', ";
                        echo 'data: [';
                        for ($j = 0; $j < count($items); $j++) {
                            if ($items[$j]->nama_kategori === $data[$i]->name) {
                                echo '[';
                                echo "'" . $items[$j]->nama_produk . ' (ID: ' . $items[$j]->id . ")',";
                                echo $items[$j]->y;
                                echo '],';
                            }
                        }
                        echo ']';
                        echo '},';
                    }
                    ?>
                ]
            }
        });
    </script>
@endpush
