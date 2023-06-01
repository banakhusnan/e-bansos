<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ URL::asset('/sneat/assets/') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $title }}</title>

    <meta name="description" content="" />

    @include('layouts.guest-partials.header')
</head>

<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                {{-- Card of Auth --}}
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="{{ URL::asset('assets/img/logo/bansos-logo.png') }}" alt="logo e-bansos"
                                        width="35px">
                                </span>
                                <span class="app-brand-text demo text-body fw-bolder">E-Bansos</span>
                            </a>
                        </div>
                        <!-- /Logo -->

                        <!-- Content -->
                        @yield('content')
                        <!-- / Content -->

                    </div>
                </div>
                {{-- End Card of Auth --}}
            </div>
        </div>
    </div>

    @include('layouts.guest-partials.footer')
</body>

</html>