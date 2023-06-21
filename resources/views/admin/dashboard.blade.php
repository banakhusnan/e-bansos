@extends('layouts.app')

@section('content-admin')
<div class="row">
    <!-- Order Statistics -->
    <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between pb-0">
                <div class="card-title mb-0">
                    <h5 class="m-0 me-2">Statistik Pembelian</h5>
                    <p class="text-muted"><span id="totalSales"></span> Total Pembeli</p>
                </div>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                        <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                        <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                        <a class="dropdown-item" href="javascript:void(0);">Share</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-column">
                        <h1 class="mb-2" id="totalOrders"></h1>
                        <span>Transaksi</span>
                    </div>
                    <div id="statisticsChart"></div>
                </div>
                <ul class="p-0 m-0">
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-warning">
                                {{-- <i class="bx bx-mobile-alt"></i> --}}
                                <i class="bi bi-lightning-fill"></i>
                            </span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Pembayaran Listrik</h6>
                                <small class="text-muted">PLN Prabayar, Pascabayar</small>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold" id="totalPriceElectricity">0</small>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class="bi bi-droplet-fill"></i>
                            </span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Pembayaran Air</h6>
                                <small class="text-muted">PDAM</small>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold" id="totalPriceWater">0</small>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-danger">
                                <i class="bi bi-wifi"></i>
                            </span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Internet</h6>
                                <small class="text-muted">Indihome</small>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold" id="totalPriceInternet"></small>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/ Order Statistics -->

    <!-- Expense Overview -->
    <div class="col-md-6 col-lg-4 order-1 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="m-0 me-2">Grafik Bantuan Yang Diberikan</h5>
                <small class="text-muted"><span id="approvedTotal"></span> Total Bantuan yang Diberikan</small>
            </div>
            <div class="card-body px-0">
                <div class="tab-content p-0">
                    <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                        <div class="d-flex p-4 pt-3">
                            <div class="avatar flex-shrink-0 p-2 me-2 bg-label-primary rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" style="fill: #696cff">
                                    <path
                                        d="M0 112.5V422.3c0 18 10.1 35 27 41.3c87 32.5 174 10.3 261-11.9c79.8-20.3 159.6-40.7 239.3-18.9c23 6.3 48.7-9.5 48.7-33.4V89.7c0-18-10.1-35-27-41.3C462 15.9 375 38.1 288 60.3C208.2 80.6 128.4 100.9 48.7 79.1C25.6 72.8 0 88.6 0 112.5zM288 352c-44.2 0-80-43-80-96s35.8-96 80-96s80 43 80 96s-35.8 96-80 96zM64 352c35.3 0 64 28.7 64 64H64V352zm64-208c0 35.3-28.7 64-64 64V144h64zM512 304v64H448c0-35.3 28.7-64 64-64zM448 96h64v64c-35.3 0-64-28.7-64-64z" />
                                </svg>
                            </div>
                            <div>
                                <small class="text-muted d-block">Total Dana Bantuan</small>
                                <div class="d-flex align-items-center">
                                    <h6 class="mb-0 me-1" id="totalBansosFund">Rp 810.000.000</h6>
                                </div>
                            </div>
                        </div>
                        <div id="bantuanChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Expense Overview -->

    <div class="col-lg-4 col-md-4 order-1">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body pb-1">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0 bg-label-primary p-2 text-center rounded">
                                <i class='bx bxs-user'></i>
                            </div>
                        </div>
                        <span class="d-block mb-1">Total Pengguna / Masyarakat</span>
                        <h3 class="card-title text-nowrap mb-2" id="totalUsers"></h3>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <a href="#">View More</a>
                    </div>
                </div>
            </div>
            <div class="col-6 mb-4">
                <div class="card">
                    <div class="card-body pb-2">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0 bg-label-success p-2 text-center rounded">
                                <i class="bi bi-file-check-fill"></i>
                            </div>
                        </div>
                        <span class="d-block mb-1">Pendaftaran</span>
                        <h3 class="card-title text-nowrap mb-2" id="totalRegistered"></h3>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <a href="#">View More</a>
                    </div>
                </div>
            </div>
            <div class="col-6 mb-4">
                <div class="card">
                    <div class="card-body pb-2">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0 bg-label-warning p-2 text-center rounded">
                                <i class="bi bi-cash-coin"></i>
                            </div>
                        </div>
                        <span class="d-block mb-1">Transaksi</span>
                        <h3 class="card-title text-nowrap mb-2" id="totalTransaction"></h3>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <a href="#">View More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script src="{{ URL::asset('/assets/js/show-dashboard.js') }}"></script>
@endpush
@endsection