@extends('layouts.app')

@section('content')
<h4 class="fw-bold user-select-none py-3">
    {{-- <span class="text-muted fw-light">Account Settings /</span> --}}
    Profile
</h4>

<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center gap-4">
            <div class="flex-shrink-0 user-select-none">
                <img src="{{ url('/assets/assets/img/avatars/1.png') }}" class="rounded" alt="user-avatar" height="100"
                    width="100" />
            </div>

            <div class="flex-grow-1 user-select-none">
                <div class="d-flex align-items-center gap-2">
                    <b class="fs-4">{{ auth()->user()->name }}</b>
                    @if (!empty($detailUser->status) && $detailUser->status == 1)
                    <small title=""><i class="bi bi-patch-check-fill text-primary"></i></small>
                    @endif
                </div>

                <span class="d-block fw-bold">{{ ucfirst(auth()->user()->getRoleNames()[0]) }}</span>
                <span class="d-block text-muted">{{ $detailUser->address ?? '-' }}</span>
            </div>

            {{-- Settings Button --}}
            <div class="dropdown clearfix">
                <button class="btn p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bx-dots-vertical-rounded'></i>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Settings Profile</a></li>
                </ul>
            </div>
            {{-- End Settings Button --}}
        </div>
    </div>

    <div class="card">
        <h5 class="card-header fw-bold">Personal Information</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="d-block align-items-center mb-3">
                        <p class="fw-bold mb-0">Nama Awal</p>
                        <p>{{ $name[0] }}</p>
                    </div>
                    <div class="d-block align-items-center mb-3">
                        <p class="fw-bold mb-0">Nama Akhir</p>
                        <p>{{ implode(' ', array_slice($name, 1, count($name))) }}</p>
                    </div>
                    <div class="d-block align-items-center mb-3">
                        <p class="fw-bold mb-0">Email</p>
                        <p>{{ auth()->user()->email }}</p>
                    </div>
                    <div class="d-block align-items-center mb-3">
                        <p class="fw-bold mb-0">Alamat</p>
                        <p>{{ $detailUser->address ?? '-' }}</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="d-block align-items-center mb-3">
                        <p class="fw-bold mb-0">Pekerjaan</p>
                        <p>{{ $detailUser->job ?? '-' }}</p>
                    </div>
                    <div class="d-block align-items-center mb-3">
                        <p class="fw-bold mb-0">NIK</p>
                        <p>{{ $detailUser->nik ?? '-' }}</p>
                    </div>
                    <div class="d-block align-items-center mb-3">
                        <p class="fw-bold mb-0">Tanggal Lahir</p>
                        <p>{{ $detailUser->date_of_birth ?? '-' }}</p>
                    </div>
                    <div class="d-block align-items-center mb-3">
                        <p class="fw-bold mb-0">Nomor Handphone</p>
                        <p>{{ $detailUser->no_handphone ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection