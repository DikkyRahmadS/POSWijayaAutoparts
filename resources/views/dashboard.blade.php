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
        <!--end::Row-->
        <div class="row gy-5 g-xl-8">
            <!--begin::Col-->
            <div class="col-xl-4">
                <!--begin::List Widget 3-->
                <div class="card card-xl-stretch mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0">
                        <h3 class="card-title fw-bolder text-dark">Todo</h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-2">
                        <!--begin::Item-->
                        <div class="d-flex align-items-center mb-8">
                            <!--begin::Bullet-->
                            <span class="bullet bullet-vertical h-40px bg-success"></span>
                            <!--end::Bullet-->
                            <!--begin::Checkbox-->
                            <div class="form-check form-check-custom form-check-solid mx-5">
                                <input class="form-check-input" type="checkbox" value="" />
                            </div>
                            <!--end::Checkbox-->
                            <!--begin::Description-->
                            <div class="flex-grow-1">
                                <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Create FireStone
                                    Logo</a>
                                <span class="text-muted fw-bold d-block">Due in 2 Days</span>
                            </div>
                            <!--end::Description-->
                            <span class="badge badge-light-success fs-8 fw-bolder">New</span>
                        </div>
                        <!--end:Item-->
                        <!--begin::Item-->

                        <!--begin::Item-->
                        <div class="d-flex align-items-center">
                            <!--begin::Bullet-->
                            <span class="bullet bullet-vertical h-40px bg-success"></span>
                            <!--end::Bullet-->
                            <!--begin::Checkbox-->
                            <div class="form-check form-check-custom form-check-solid mx-5">
                                <input class="form-check-input" type="checkbox" value="" />
                            </div>
                            <!--end::Checkbox-->
                            <!--begin::Description-->
                            <div class="flex-grow-1">
                                <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Customers
                                    Update</a>
                                <span class="text-muted fw-bold d-block">Due in 1 week</span>
                            </div>
                            <!--end::Description-->
                            <span class="badge badge-light-success fs-8 fw-bolder">New</span>
                        </div>
                        <!--end:Item-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end:List Widget 3-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-8">
                <!--begin::Tables Widget 9-->
                <div class="card card-xl-stretch mb-5 mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">Members Statistics</span>
                            <span class="text-muted mt-1 fw-bold fs-7">Over 500 members</span>
                        </h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <!--begin::Table container-->
                        <div class="mixed-widget-10-chart" data-kt-color="primary" style="height: 175px"></div>
                        <!--end::Table container-->
                    </div>
                    <!--begin::Body-->
                </div>
                <!--end::Tables Widget 9-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Modals-->
    </div>
@endsection
