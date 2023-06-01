@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-9 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-8">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Selamat datang {{ explode(' ', auth()->user()->name)[0] }}!
                            🎉</h5>
                        <p class="mb-4">
                            Anda dapat mendaftar, mengajukan bantuan sosial, dan melacak status penyaluran dengan mudah.
                            Bergabunglah dengan ribuan orang yang telah merasakan manfaatnya. Bersama-sama, mari kita
                            berbuat lebih banyak untuk meringankan beban sosial dan menciptakan masyarakat yang lebih
                            adil.
                        </p>
                    </div>
                </div>
                <div class="col-sm-4 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="{{ asset('/sneat/assets/img/illustrations/man-with-laptop-light.png') }}" height="140"
                            alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <img src="{{ URL::asset('/sneat/assets/img/icons/unicons/wallet-info.png') }}" alt="Credit Card"
                            class="rounded" />
                    </div>

                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                        </div>
                    </div>
                </div>
                <span>Saldo</span>
                <h5 class="card-title text-nowrap mb-0">Rp 1.000.000</h5>
            </div>

            <hr class="my-0">

            <div class="mt-0 card-body p-3">
                <div class="d-flex gap-1">
                    <div class="rounded avatar border text-center fs-4" title="History">
                        <i class='bx bx-history'></i>
                    </div>
                    <div class="rounded avatar border text-center fs-4" title="Top Up">
                        <i class='bx bx-plus'></i>
                    </div>
                    <div class="rounded avatar border text-center fs-4" title="history">
                        <i class='bx bx-history'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <img src="{{ url('https://web.pln.co.id/statics/img/logo-header-20170501a.jpg') }}" alt="PLN" />

                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                        </div>
                    </div>
                </div>
                <span>Pembayaran Listrik</span>
                <h3 class="card-title text-nowrap mb-1">PLN</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <img src="{{ url('https://img.antaranews.com/cache/800x533/2017/07/20170703logo-pdam-001ilustrasi1.jpg') }}"
                        height="67px" alt="PDAM" />

                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                        </div>
                    </div>
                </div>
                <span>Pembayaran Air Bersih</span>
                <h3 class="card-title text-nowrap mb-1">PDAM</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <img src="{{ url('https://indihome.co.id/images/logo_indiHome.png') }}" height="67px" alt="PDAM" />

                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                        </div>
                    </div>
                </div>
                <span>Pembayaran Internet</span>
                <h3 class="card-title text-nowrap mb-1">Indihome</h3>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    document.addEventListener("DOMContentLoaded", function(){
        var element = document.getElementById("myToast");

        // Create toast instance
        var myToast = new bootstrap.Toast(element);

        myToast.show();
    });
</script>
@endpush
@endsection