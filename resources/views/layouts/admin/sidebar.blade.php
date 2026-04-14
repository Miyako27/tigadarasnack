<nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
    <a class="navbar-brand me-lg-5" href="../../index.html">
        <img class="navbar-brand-dark" src="assets-admin/assets/img/brand/light.svg" alt="Volt logo" />
        <img class="navbar-brand-light" src="assets-admin/assets/img/brand/dark.svg" alt="Volt logo" />
    </a>
    <div class="d-flex align-items-center">
        <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<nav id="sidebarMenu" class="sidebar d-lg-block bg-pink text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">
        <ul class="nav flex-column pt-3 pt-md-0">
            <li class="nav-item d-flex justify-content-center mb-3">
                <a href="{{ route('home') }}" class="sidebar-icon">
                    <img src="{{ asset('assets/img/logo.png') }}" height="100" width="100" alt="Logo">
                </a>
            </li>
            <li class="nav-item {{ request()->is('dashboard*') ? 'active' : '' }} ">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <img src="{{ asset('assets-admin/assets/img/icon-dashboard.png') }}" height="23"
                            width="23" alt="Dashboard">
                    </span>
                    <span class="sidebar-text">Dashboard</span>
                </a>
            </li>
            {{-- <li class="nav-item {{ request()->is('pelanggan*') ? 'active' : '' }}">
                <a href="{{ route('pelanggan.list') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <img src="{{ asset('assets-admin/assets/img/icon-pelanggan.png') }}" height="23"
                            width="23" alt="Pelanggan">
                    </span>
                    <span class="sidebar-text">Pelanggan</span>
                </a>
            </li> --}}
            {{-- Sidebar Data Mitra --}}
            {{-- <li class="nav-item {{ request()->is('mitra*') ? 'active' : '' }}">
                <a href="{{ route('mitra.list') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <img src="{{ asset('assets-admin/assets/img/icon-mitra.png') }}" height="23" width="23"
                            alt="Mitra">
                    </span>
                    <span class="sidebar-text">Mitra</span>
                </a>
            </li> --}}
            {{-- Sidebar Data User --}}
            <li class="nav-item {{ request()->is('user*') ? 'active' : '' }}">
                <a href="{{ route('user.list') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <img src="{{ asset('assets-admin/assets/img/icon-user.png') }}" height="23" width="23"
                            alt="User">
                    </span>
                    <span class="sidebar-text">User</span>
                </a>
            </li>
            {{-- Sidebar Data Produk --}}
            <li class="nav-item {{ request()->is('produk*') ? 'active' : '' }}">
                <a href="{{ route('produk.list') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <img src="{{ asset('assets-admin/assets/img/icon-produk.png') }}" height="23"
                            width="23" alt="Produk">
                    </span>
                    <span class="sidebar-text">Produk</span>
                </a>
            </li>
            {{-- Sidebar Data Ulasan --}}
            <li class="nav-item {{ request()->is('ulasan*') ? 'active' : '' }}">
                <a href="{{ route('ulasan.list') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <img src="{{ asset('assets-admin/assets/img/icon-ulasan.png') }}" height="23"
                            width="23" alt="Produk">
                    </span>
                    <span class="sidebar-text">Ulasan</span>
                </a>
            </li>
            {{-- Sidebar Data galeri --}}
            <li class="nav-item {{ request()->is('galeri*') ? 'active' : '' }}">
                <a href="{{ route('galeri.list') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <img src="{{ asset('assets-admin/assets/img/icon-galeri.png') }}" height="23"
                            width="23" alt="Galeri">
                    </span>
                    <span class="sidebar-text">Galeri</span>
                </a>
            </li>
        </ul>
    </div>
    <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"
    style="width: 80%; margin: 0 auto; border-top-width: 2px;"> </li>
</nav>
