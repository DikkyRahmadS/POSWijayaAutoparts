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


        <!--begin::Row-->
        <div class="row gy-5 g-xl-8 ">
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 ">
                <!--begin::Card widget 4-->
                <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <div class="card-title d-flex flex-column">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <!--begin::Currency-->
                                <span class="fs-4 fw-bold text-gray-400 me-1 align-self-start">$</span>
                                <!--end::Currency-->
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">69,700</span>
                                <!--end::Amount-->
                                <!--begin::Badge-->
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
                                <!--end::Badge-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Subtitle-->
                            <span class="text-gray-400 pt-1 fw-bold fs-6">Expected Earnings</span>
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
                                <div class="fw-boldest text-gray-700 text-xxl-end">$7,660</div>
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
                                <div class="fw-boldest text-gray-700 text-xxl-end">$2,820</div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Labels-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card widget 4-->

            </div>
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 ">
                <!--begin::Card widget 6-->
                <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <div class="card-title d-flex flex-column">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <!--begin::Currency-->
                                <span class="fs-4 fw-bold text-gray-400 me-1 align-self-start">$</span>
                                <!--end::Currency-->
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">2,420</span>
                                <!--end::Amount-->
                                <!--begin::Badge-->
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
                                <!--end::Badge-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Subtitle-->
                            <span class="text-gray-400 pt-1 fw-bold fs-6">Average Daily Sales</span>
                            <!--end::Subtitle-->
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Card body-->

                    <!--end::Card body-->
                </div>
                <!--end::Card widget 6-->
                <!--begin::Card widget 7-->

            </div>

        </div>
        <!--end::Row-->

        {{-- Recent order dan grafik samping --}}
        <div class="row gy-5 g-xl-10">
            <!--begin::Col-->
            <div class="col-xl-6 mb-xl-10">
                <!--begin::Tables widget 2-->
                <div class="card h-md-100">
                    <!--begin::Header-->
                    <div class="card-header align-items-center border-0">
                        <!--begin::Title-->
                        <h3 class="fw-bolder text-gray-900 m-0">Recent Orders</h3>
                        <!--end::Title-->
                        <!--begin::Menu-->
                        <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                            data-kt-menu-overflow="true">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                        rx="4" fill="black" />
                                    <rect x="11" y="11" width="2.6" height="2.6" rx="1.3"
                                        fill="black" />
                                    <rect x="15" y="11" width="2.6" height="2.6" rx="1.3"
                                        fill="black" />
                                    <rect x="7" y="11" width="2.6" height="2.6" rx="1.3"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--begin::Menu 2-->

                        <!--end::Menu 2-->
                        <!--end::Menu-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-2">
                        <!--begin::Nav-->
                        <ul class="nav nav-pills nav-pills-custom mb-3">
                            <!--begin::Item-->
                            <li class="nav-item mb-3 me-3 me-lg-6">
                                <!--begin::Link-->
                                <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden active w-80px h-85px py-4"
                                    data-bs-toggle="pill" href="#kt_stats_widget_2_tab_1">
                                    <!--begin::Icon-->
                                    <div class="nav-icon">
                                        <img alt="" src="assets/media/svg/products-categories/t-shirt.svg"
                                            class="" />
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Subtitle-->
                                    <span class="nav-text text-gray-700 fw-bolder fs-6 lh-1">T-shirt</span>
                                    <!--end::Subtitle-->
                                    <!--begin::Bullet-->
                                    <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                    <!--end::Bullet-->
                                </a>
                                <!--end::Link-->
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="nav-item mb-3 me-3 me-lg-6">
                                <!--begin::Link-->
                                <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4"
                                    data-bs-toggle="pill" href="#kt_stats_widget_2_tab_2">
                                    <!--begin::Icon-->
                                    <div class="nav-icon">
                                        <img alt="" src="assets/media/svg/products-categories/gaming.svg"
                                            class="" />
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Subtitle-->
                                    <span class="nav-text text-gray-700 fw-bolder fs-6 lh-1">Gaming</span>
                                    <!--end::Subtitle-->
                                    <!--begin::Bullet-->
                                    <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                    <!--end::Bullet-->
                                </a>
                                <!--end::Link-->
                            </li>
                            <!--end::Item-->

                        </ul>
                        <!--end::Nav-->
                        <!--begin::Tab Content-->
                        <div class="tab-content">
                            <!--begin::Tap pane-->
                            <div class="tab-pane fade show active" id="kt_stats_widget_2_tab_1">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="fs-7 fw-bolder text-gray-500 border-bottom-0">
                                                <th class="ps-0 w-50px">ITEM</th>
                                                <th class="min-w-140px"></th>
                                                <th class="text-end min-w-140px">QTY</th>
                                                <th class="pe-0 text-end min-w-120px">PRICE</th>
                                                <th class="pe-0 text-end min-w-120px">TOTAL PRICE</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <img src="assets/media/stock/ecommerce/210.gif" class="w-50px ms-n1"
                                                        alt="" />
                                                </td>
                                                <td class="ps-0">
                                                    <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                        class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6 text-start pe-0">Elephant
                                                        1802</a>
                                                    <span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">Item:
                                                        #XDG-2347</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-gray-800 fw-bolder d-block fs-6 ps-0 text-end">x1</span>
                                                </td>
                                                <td class="text-end pe-0">
                                                    <span class="text-gray-800 fw-bolder d-block fs-6">$72.00</span>
                                                </td>
                                                <td class="text-end pe-0">
                                                    <span class="text-gray-800 fw-bolder d-block fs-6">$126.00</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="assets/media/stock/ecommerce/215.gif" class="w-50px ms-n1"
                                                        alt="" />
                                                </td>
                                                <td class="ps-0">
                                                    <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                                                        class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6 text-start pe-0">Red
                                                        Laga</a>
                                                    <span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">Item:
                                                        #XDG-1321</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-gray-800 fw-bolder d-block fs-6 ps-0 text-end">x2</span>
                                                </td>
                                                <td class="text-end pe-0">
                                                    <span class="text-gray-800 fw-bolder d-block fs-6">$45.00</span>
                                                </td>
                                                <td class="text-end pe-0">
                                                    <span class="text-gray-800 fw-bolder d-block fs-6">$76.00</span>
                                                </td>
                                            </tr>

                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Tap pane-->


                        </div>
                        <!--end::Tab Content-->
                    </div>
                    <!--end: Card Body-->
                </div>
                <!--end::Tables widget 2-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-6 mb-5 mb-xl-10">
                <!--begin::Chart widget 4-->
                <div class="card card-flush overflow-hidden h-md-100">
                    <!--begin::Header-->
                    <div class="card-header py-5">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder text-dark">Discounted Product Sales</span>
                            <span class="text-gray-400 mt-1 fw-bold fs-6">Users from all channels</span>
                        </h3>
                        <!--end::Title-->
                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Menu-->
                            <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                data-kt-menu-overflow="true">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.3" x="2" y="2" width="20"
                                            height="20" rx="4" fill="black" />
                                        <rect x="11" y="11" width="2.6" height="2.6"
                                            rx="1.3" fill="black" />
                                        <rect x="15" y="11" width="2.6" height="2.6"
                                            rx="1.3" fill="black" />
                                        <rect x="7" y="11" width="2.6" height="2.6"
                                            rx="1.3" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                            <!--begin::Menu 2-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Quick Actions</div>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator mb-3 opacity-75"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">New Ticket</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">New Customer</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                    data-kt-menu-placement="right-start">
                                    <!--begin::Menu item-->
                                    <a href="#" class="menu-link px-3">
                                        <span class="menu-title">New Group</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <!--end::Menu item-->
                                    <!--begin::Menu sub-->
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Admin Group</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Staff Group</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Member Group</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">New Contact</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator mt-3 opacity-75"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content px-3 py-3">
                                        <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                    </div>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu 2-->
                            <!--end::Menu-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Card body-->
                    <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                        <!--begin::Info-->
                        <div class="px-9 mb-5">
                            <!--begin::Statistics-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Currency-->
                                <span class="fs-4 fw-bold text-gray-400 align-self-start me-1">$</span>
                                <!--end::Currency-->
                                <!--begin::Value-->
                                <span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2">3,706</span>
                                <!--end::Value-->
                                <!--begin::Label-->
                                <span class="badge badge-success fs-base">
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
                                    <!--end::Svg Icon-->4.5%
                                </span>
                                <!--end::Label-->
                            </div>
                            <!--end::Statistics-->
                            <!--begin::Description-->
                            <span class="fs-6 fw-bold text-gray-400">Total Discounted Sales This Month</span>
                            <!--end::Description-->
                        </div>
                        <!--end::Info-->
                        <!--begin::Chart-->
                        <div id="kt_charts_widget_4" class="min-h-auto ps-4 pe-6" style="height: 300px"></div>
                        <!--end::Chart-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Chart widget 4-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Modals-->
    </div>
@endsection
