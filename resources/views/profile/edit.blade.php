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
                    <img src="{{ url('/sneat/assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block rounded"
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
                        <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input class="form-control" type="text" id="firstName" name="firstName"
                                value="{{ $name[0] }}" autofocus />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input class="form-control" type="text" name="lastName" id="lastName"
                                value="{{ implode(' ' ,array_slice($name, 1, count($name))) }}" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control" type="text" id="email" name="email"
                                value="{{ auth()->user()->email }}" placeholder="john.doe@example.com" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="no_handphone">Phone Number</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">ID (+62)</span>
                                <input type="text" id="no_handphone" name="no_handphone" class="form-control"
                                    value="{{ substr($data->no_handphone, 3) }}" placeholder="85xxxxxxxxxx" />
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                value="{{ $data->date_of_birth }}" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ $data->address }}" placeholder="Address" />
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
@endsection