@extends('layouts.guest')

@section('content')
<h4 class="mb-2">Adventure starts here 🚀</h4>
<p class="mb-4">Make your app management easy and fun!</p>

<form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
    @csrf
    <div class="has-validation mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
            placeholder="Enter your fullname" autofocus />
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="has-validation mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
            placeholder="Enter your email" />
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3 form-password-toggle">
        <label class="form-label" for="password">Password</label>
        <div class="input-group input-group-merge">
            <input type="password" id="password" class="form-control" name="password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password" />
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
        </div>
    </div>

    <div class="mb-3 form-password-toggle">
        <label class="form-label" for="password_confirmation">Confirm Password</label>
        <div class="input-group input-group-merge has-validation">
            <input type="password" id="password_confirmation"
                class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password_confirmation" />
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            @error('password_confirmation')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <div class="has-validation form-check">
            <input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox" id="terms-conditions"
                name="terms" />
            <label class="form-check-label" for="terms-conditions">
                I agree to
                <a href="javascript:void(0);">privacy policy & terms</a>
            </label>
            @error('terms')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <button class="btn btn-primary d-grid w-100">Sign up</button>
</form>

<p class="text-center">
    <span>Already have an account?</span>
    <a href="auth-login-basic.html">
        <span>Sign in instead</span>
    </a>
</p>
@endsection