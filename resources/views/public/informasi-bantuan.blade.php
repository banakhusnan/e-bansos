@extends('layouts.app')

@push('css')
<style>
    .item-card h6 {
        margin-bottom: 0;
    }

    .item-card {
        margin-bottom: 1rem
    }

    .info-header {
        padding: 1.5rem .3rem;
        margin-bottom: 0;
        background-color: transparent;
    }

    .info-body {
        padding: 0 .3rem;
        margin-bottom: 0;
        background-color: transparent;
    }

    .bg-disabled {
        background-color: #eceef1;
    }
</style>
@endpush

@section('content')
@include('layouts.flash')
<h4 class="fw-bold user-select-none py-3">
    <span class="text-muted fw-light">Bantuan Sosial /</span>
    Informasi Bantuan
</h4>
<div class="card">
    <div class="card-body">

        <div class="row">
            <p class="fs-5">Informasi lengkap tentang bantuan sosial atau pelaporan</p>
            <div class="col-md-3">
                <div class="card bg-disabled">
                    <div class="card-header border-bottom">
                        <h5 class="fw-bold mb-0">Data Kamu</h5>
                    </div>
                    <div class="card-body pt-3">
                        <div class="item-card">
                            <h6>Nama Lengkap</h6>
                            <p>{{ auth()->user()->name }}</p>
                        </div>

                        <div class="item-card">
                            <h6>No Handphone</h6>
                            <p>{{ $data->no_handphone ?? '-' }}</p>
                        </div>

                        <div class="item-card mb-0">
                            <h6>Saldo</h6>
                            <p class="mb-0">Rp 0</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="info-header">
                    <h5 class="fw-bold">Status Bantuan Kamu</h5>
                </div>
                <div class="info-body">
                    @if ($data->status_bansos === 'berhasil')
                    <p class="fs-5">
                        Mendapat bantuan <i class="bi bi-patch-check-fill text-primary"></i>
                    </p>
                    @elseif($data->status_bansos === 'gagal')
                    <p class="fs-5">
                        Tidak mendapat bantuan <i class='bx bxs-x-circle text-danger'></i>
                    </p>
                    @elseif($data->status_bansos === 'proses')
                    <p class="fs-5">
                        Bantuan kamu sedang diproses <i class='bx bxs-time text-warning'></i>
                    </p>
                    @else
                    ok
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection