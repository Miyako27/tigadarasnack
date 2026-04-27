@extends('layouts.admin.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <h2 class="h4">Dashboard</h2>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- ATAS: Total User, Total Produk, Total Galeri --}}
    <div class="row g-3 mb-4">
        <div class="col-12 col-md-4">
            <div class="card border-0 shadow text-center h-100" style="background-color: #e6f7ff;">
                <div class="card-body">
                    <h5 class="fw-bold mb-1">Total User</h5>
                    <h3 class="fw-bold mb-0">{{ $total_user }}</h3>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card border-0 shadow text-center h-100" style="background-color: #fff5e6;">
                <div class="card-body">
                    <h5 class="fw-bold mb-1">Total Produk</h5>
                    <h3 class="fw-bold mb-0">{{ $total_produk }}</h3>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card border-0 shadow text-center h-100" style="background-color: #e9f9ee;">
                <div class="card-body">
                    <h5 class="fw-bold mb-1">Total Galeri</h5>
                    <h3 class="fw-bold mb-0">{{ $total_galeri }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- TENGAH: Produk terbaru dan Ulasan terbaru --}}
    <div class="row g-3 mb-4">
        <div class="col-12 col-xl-6">
            <div class="card border-0 shadow h-100">
                <div class="card-body">
                    <h2 class="fs-5 fw-bold mb-3" style="color: #F195B2;">Produk Terbaru</h2>

                    @if ($produkTerbaru->isEmpty())
                        <p class="text-muted mb-0">Belum ada produk terbaru.</p>
                    @else
                        <ul class="list-group list-group-flush">
                            @foreach ($produkTerbaru as $dataProduk)
                                <li class="list-group-item d-flex justify-content-between align-items-center py-3"
                                    style="background-color: #f9f9f9; border: none;">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/produk/' . $dataProduk->foto_produk) }}"
                                            alt="Gambar {{ $dataProduk->nama_produk }}"
                                            style="width: 64px; height: 64px; object-fit: cover; border-radius: 8px; margin-right: 12px;">

                                        <div>
                                            <strong class="d-block">{{ $dataProduk->nama_produk }}</strong>
                                            <small class="text-muted">Rp {{ $dataProduk->harga_produk_rupiah }}</small>
                                        </div>
                                    </div>

                                    <span class="badge bg-primary rounded-pill" style="font-size: 0.8em;">
                                        {{ \Carbon\Carbon::parse($dataProduk->created_at)->format('d M Y') }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-6">
            <div class="card border-0 shadow h-100">
                <div class="card-body">
                    <h2 class="fs-5 fw-bold mb-3" style="color: #F195B2;">Ulasan Terbaru</h2>

                    @if ($ulasanTerbaru->isEmpty())
                        <p class="text-muted mb-0">Belum ada ulasan terbaru.</p>
                    @else
                        <ul class="list-group list-group-flush">
                            @foreach ($ulasanTerbaru as $dataUlasan)
                                <li class="list-group-item py-3" style="background-color: #f9f9f9; border: none;">
                                    <div class="d-flex justify-content-between align-items-start gap-2">
                                        <div>
                                            <strong class="d-block">{{ $dataUlasan->nama_ulasan }}</strong>
                                            <small class="text-muted d-block mb-1">{{ $dataUlasan->keterangan_ulasan }}</small>
                                            <small class="text-muted">{{ \Illuminate\Support\Str::limit($dataUlasan->ulasan, 90) }}</small>
                                        </div>
                                        <span class="badge bg-primary rounded-pill" style="font-size: 0.8em;">
                                            {{ \Carbon\Carbon::parse($dataUlasan->created_at)->format('d M Y') }}
                                        </span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- BAWAH: Galeri terbaru --}}
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h2 class="fs-5 fw-bold mb-3" style="color: #F195B2;">Galeri Terbaru</h2>

                    @if ($galeriTerbaru->isEmpty())
                        <p class="text-muted mb-0">Belum ada galeri terbaru.</p>
                    @else
                        <div class="row g-3">
                            @foreach ($galeriTerbaru as $dataGaleri)
                                <div class="col-6 col-md-4 col-xl-2">
                                    <div class="border rounded p-2 h-100" style="background-color: #f9f9f9;">
                                        <img src="{{ asset('storage/galeri/' . $dataGaleri->galeri) }}" alt="Galeri"
                                            class="img-fluid rounded mb-2"
                                            style="width: 100%; height: 120px; object-fit: cover;">
                                        <small class="text-muted d-block text-center">
                                            {{ \Carbon\Carbon::parse($dataGaleri->created_at)->format('d M Y') }}
                                        </small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
