<!-- Topbar Start -->
<div class="container-fluid bg-primary py-3 d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-lg-left">
                <div class="d-inline-flex align-items-center">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<div class="container-fluid position-relative nav-bar p-0">
    <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow p-lg-0">
            <a href="index.html" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-primary"><span class="text-secondary">i</span>CREAM</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->is('home*') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('diskon') }}" class="nav-item nav-link {{ request()->is('diskon*') ? 'active' : '' }}">Diskon</a>
                    <a href="{{ route('product') }}" class="nav-item nav-link {{ request()->is('product*') ? 'active' : '' }}">Produk</a>
                </div>
                <a href="index.html" class="navbar-brand mx-5 d-none d-lg-block">
                    <h1 class="m-0 display-4 text-primary"><span class="text-secondary">C'</span>3Daraaa</h1>
                </a>
                <div class="navbar-nav mr-auto py-0">
                    <a href="{{ route('home.galeri') }}" class="nav-item nav-link {{ request()->is('gallery*') ? 'active' : '' }}">Galeri</a>
                    <a href="{{ route('tentang') }}" class="nav-item nav-link {{ request()->is('tentang*') ? 'active' : '' }}">Tentang</a>
                    <div class="d-inline-flex align-items-center">
                        <button class="btn" style="background-color: #62C3E7; color: black; border: none;">
                            <a href="login" style="color: black; text-decoration: none;">Login</a>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
