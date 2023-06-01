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
                <img src="{{ url('/sneat/assets/img/avatars/1.png') }}" alt="user-avatar" height="100" width="100" />
            </div>

            <div class="flex-grow-1 user-select-none">
                <div class="d-flex align-items-center gap-2">
                    <b class="fs-4">{{ auth()->user()->name }}</b>
                    <small title=""><i class="bi bi-patch-check-fill text-primary"></i></small>
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
                        <p class="fw-bold mb-0">First Name</p>
                        <p>{{ $name[0] }}</p>
                    </div>
                    <div class="d-block align-items-center mb-3">
                        <p class="fw-bold mb-0">Last Name</p>
                        <p>{{ implode(' ', array_slice($name, 1, count($name))) }}</p>
                    </div>
                    <div class="d-block align-items-center mb-3">
                        <p class="fw-bold mb-0">Email Adress</p>
                        <p>{{ auth()->user()->email }}</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="d-block align-items-center mb-3">
                        <p class="fw-bold mb-0">Adress</p>
                        <p>{{ $detailUser->address ?? '-' }}</p>
                    </div>
                    <div class="d-block align-items-center mb-3">
                        <p class="fw-bold mb-0">Date of Birth</p>
                        <p>{{ $detailUser->date_of_birth ?? '-' }}</p>
                    </div>
                    <div class="d-block align-items-center mb-3">
                        <p class="fw-bold mb-0">Phone Number</p>
                        <p>{{ $detailUser->no_handphone ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection