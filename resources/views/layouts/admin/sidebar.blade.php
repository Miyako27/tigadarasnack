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
                        <svg class="icon icon-xs" fill="none" stroke="black" stroke-width="1.8"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 3h6.75v8.25H3.75V3Zm9.75 0h6.75v5.25H13.5V3ZM13.5 11.25h6.75V21H13.5v-9.75ZM3.75 14.25h6.75V21H3.75v-6.75Z" />
                        </svg>
                    </span>
                    <span class="sidebar-text">Dashboard</span>
                </a>
            </li>
            {{-- Sidebar Data User --}}
            <li class="nav-item {{ request()->is('user*') ? 'active' : '' }}">
                <a href="{{ route('user.list') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs" fill="none" stroke="black" stroke-width="1.8"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 19.5a7.5 7.5 0 0 1 15 0" />
                        </svg>
                    </span>
                    <span class="sidebar-text">User</span>
                </a>
            </li>
            {{-- Sidebar Data Produk --}}
            <li class="nav-item {{ request()->is('produk*') ? 'active' : '' }}">
                <a href="{{ route('produk.list') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs" fill="none" stroke="black" stroke-width="1.8"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m7.5 4.5 9 4.5m-9 0 9-4.5m-9 4.5v10.5m9-10.5v10.5m-9 0 9-4.5m-9 4.5-4.5-2.25V6.75L7.5 9m9 10.5 4.5-2.25V6.75L16.5 9" />
                        </svg>
                    </span>
                    <span class="sidebar-text">Produk</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('pemesanan*') ? 'active' : '' }}">
                <a href="{{ route('pemesanan.list') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs" fill="none" stroke="black" stroke-width="1.8"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h6m-6 4h6M7 4h10a2 2 0 0 1 2 2v12l-3-1.5L13 18l-3-1.5L7 18V6a2 2 0 0 1 2-2Z" />
                        </svg>
                    </span>
                    <span class="sidebar-text">Pemesanan</span>
                </a>
            </li>
            {{-- Sidebar Data Ulasan --}}
            <li class="nav-item {{ request()->is('ulasan*') ? 'active' : '' }}">
                <a href="{{ route('ulasan.list') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs" fill="none" stroke="black" stroke-width="1.8"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.5 8.25h9m-9 3h6m-9.75 8.25 2.318-2.318a1.5 1.5 0 0 1 1.06-.44H18A2.25 2.25 0 0 0 20.25 14.5v-9A2.25 2.25 0 0 0 18 3.25H6A2.25 2.25 0 0 0 3.75 5.5v12.94c0 .595.72.893 1.14.473Z" />
                        </svg>
                    </span>
                    <span class="sidebar-text">Ulasan</span>
                </a>
            </li>
            {{-- Sidebar Data galeri --}}
            <li class="nav-item {{ request()->is('galeri*') ? 'active' : '' }}">
                <a href="{{ route('galeri.list') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs" fill="none" stroke="black" stroke-width="1.8"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 15.75 6 12l2.25 2.25 6-6 7.5 7.5M4.5 19.5h15A2.25 2.25 0 0 0 21.75 17.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15A2.25 2.25 0 0 0 2.25 6.75v10.5A2.25 2.25 0 0 0 4.5 19.5ZM9 8.625a1.125 1.125 0 1 1-2.25 0 1.125 1.125 0 0 1 2.25 0Z" />
                        </svg>
                    </span>
                    <span class="sidebar-text">Galeri</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
