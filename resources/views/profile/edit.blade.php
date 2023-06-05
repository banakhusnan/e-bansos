@extends('layouts.app')

@section('content')
<h4 class="fw-bold py-3">
    <a href="{{ route('profile.index') }}" class="text-muted fw-light">Profile /</a>
    <span class="user-select-none">Settings Profile</span>
</h4>
<div class="row">
    <div class="col-md-12">
        @include('layouts.flash')
        <div class="card mb-4">
            <h5 class="card-header user-select-none">Profile Details</h5>
            <!-- Account -->
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{ url('/assets/assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block rounded"
                        height="100" width="100" id="uploadedAvatar" />
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" class="account-file-input" hidden
                                accept="image/png, image/jpeg" />
                        </label>
                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                        </button>

                        <p class="text-muted mb-0 user-select-none">Allowed JPG, GIF or PNG. Max size of 800K</p>
                    </div>
                </div>
            </div>

            <hr class="my-0" />

            <div class="card-body">
                <form id="formAccountSettings" method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="has-validation mb-3 col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input class="form-control @error('firstName') is-invalid @enderror" type="text"
                                id="firstName" name="firstName" value="{{ old('firstName', $name[0]) }}" autofocus />
                            @error('firstName')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="has-validation mb-3 col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input class="form-control @error('lastName') is-invalid @enderror" type="text"
                                name="lastName" id="lastName"
                                value="{{ old('lastName', implode(' ' ,array_slice($name, 1, count($name)))) }}" />
                            @error('lastName')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="has-validation mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" id="email"
                                name="email" value="{{ old('email',auth()->user()->email) }}"
                                placeholder="john.doe@example.com" />
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="has-validation mb-3 col-md-6">
                            <label class="form-label" for="no_handphone">Phone Number</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text @error('no_handphone') is-invalid @enderror">ID
                                    (+62)</span>
                                <input type="text" id="no_handphone" name="no_handphone"
                                    class="form-control @error('no_handphone') is-invalid @enderror"
                                    value="{{ old('no_handphone', !empty($data->no_handphone) ? substr($data->no_handphone, 3) : '' ) }}"
                                    placeholder="85xxxxxxxxxx" />
                                @error('no_handphone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="has-validation mb-3 col-md-6">
                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                id="date_of_birth" name="date_of_birth"
                                value="{{ old('date_of_birth', $data->date_of_birth ?? '') }}" />
                            @error('date_of_birth')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="has-validation mb-3 col-md-6">
                            <label class="form-label" for="address">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                                name="address" value="{{ old('address',$data->address ?? '') }}"
                                placeholder="Address" />
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="has-validation mb-3 col-md-6">
                            <label class="form-label" for="address">NIK</label>
                            <input type="text" class="form-control @error('nik') is-invalid @enderror" id="address"
                                name="nik" value="{{ old('nik', $data->nik ?? '') }}" placeholder="NIK" />
                            @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="has-validation mb-3 col-md-6">
                            <label class="form-label" for="address">Pekerjaan</label>
                            <select name="job" class="form-select" id="">
                                @foreach (['PNS', 'Karyawan Swasta', 'Petani'] as $item)
                                @if (!empty($data->job) && $item === $data->job)
                                <option selected>{{ $item }}</option>
                                @else
                                <option>{{ $item }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
</div>

@push('js')
<script>
    const span = document.querySelector('span.input-group-text')
    if (span.classList.contains('is-invalid')) {
        span.style.border = '1px solid #ff3e1d'
    }
</script>
@endpush
@endsection