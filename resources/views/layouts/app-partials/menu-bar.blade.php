<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ URL::asset('assets/img/logo/bansos-logo.png') }}" alt="logo e-bansos" width="35px">
            </span>
            <span class="app-brand-text demo text-body fw-bolder ms-2">E-Bansos</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Route::is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Layouts -->
        <li class="menu-item {{ Route::is('bansos.*') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Bantuan Sosial</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('bansos.informasi-bantuan') ? 'active' : '' }}">
                    <a href="{{ route('bansos.informasi-bantuan') }}" class="menu-link">
                        <div data-i18n="Without menu">Informasi Bantuan</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('bansos.pendaftaran') ? 'active' : '' }}">
                    <a href="{{ route('bansos.pendaftaran') }}" class="menu-link">
                        <div data-i18n="Without menu">Pendaftaran</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>