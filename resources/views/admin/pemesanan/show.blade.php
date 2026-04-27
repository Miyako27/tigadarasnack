@extends('layouts.admin.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <h2 class="h4">Detail Pemesanan</h2>
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
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pemesanan.list') }}">Pemesanan</a></li>
                    <li class="breadcrumb-item active">Detail Pemesanan</li>
                </ol>
            </nav>

        </div>
        <div class="btn-toolbar mb-2 mb-md-0 gap-2">
            <a href="{{ route('pemesanan.edit', $dataPemesanan->pemesanan_id) }}"
                class="btn btn-sm btn-warning d-inline-flex align-items-center">
                Edit
            </a>
            <a href="{{ route('pemesanan.list') }}" class="btn btn-sm btn-secondary text-white d-inline-flex align-items-center">
                Kembali
            </a>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12">
            <div class="card border-0 shadow overflow-hidden">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">
                        <div>
                            <h3 class="h4 mb-1">{{ $dataPemesanan->nama_customer }}</h3>
                            <div class="text-muted">Nomor HP: {{ $dataPemesanan->nomor_hp }}</div>
                        </div>
                        <div class="text-end">
                            <span class="badge {{ $dataPemesanan->status_badge_class }}">{{ $dataPemesanan->status_pemesanan }}</span>
                            <div class="small text-muted mt-2">ID Pesanan: #{{ $dataPemesanan->pemesanan_id }}</div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="border rounded p-3 h-100 bg-light">
                                <div class="text-muted small mb-1">ID Pemesanan</div>
                                <div class="fw-bold">#{{ $dataPemesanan->pemesanan_id }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border rounded p-3 h-100">
                                <div class="text-muted small mb-1">Tanggal Pesanan</div>
                                <div class="fw-bold">{{ $dataPemesanan->tanggal_pesanan->format('d/m/Y H:i') }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border rounded p-3 h-100">
                                <div class="text-muted small mb-1">Dibuat Pada</div>
                                <div class="fw-bold">{{ $dataPemesanan->created_at?->format('d/m/Y H:i') ?? '-' }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border rounded p-3 h-100">
                                <div class="text-muted small mb-1">Diperbarui Pada</div>
                                <div class="fw-bold">{{ $dataPemesanan->updated_at?->format('d/m/Y H:i') ?? '-' }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border rounded p-3 h-100">
                                <div class="text-muted small mb-1">Tanggal Pengambilan / Pengiriman</div>
                                <div class="fw-bold">{{ $dataPemesanan->tanggal_pengambilan_pengiriman->format('d/m/Y') }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border rounded p-3 h-100">
                                <div class="text-muted small mb-1">Metode Pembayaran</div>
                                <div class="fw-bold">{{ $dataPemesanan->metode_pembayaran }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border rounded p-3 h-100">
                                <div class="text-muted small mb-1">Status Pemesanan</div>
                                <div class="fw-bold">{{ $dataPemesanan->status_pemesanan }}</div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="border rounded p-3 h-100">
                                <div class="text-muted small mb-1">Produk</div>
                                <div class="fw-bold">{{ $dataPemesanan->produk?->nama_produk ?? '-' }}</div>
                                <div class="small text-muted">Harga satuan: Rp {{ $dataPemesanan->produk?->harga_produk_rupiah ?? '0' }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border rounded p-3 h-100">
                                <div class="text-muted small mb-1">Produk ID</div>
                                <div class="fw-bold">{{ $dataPemesanan->produk_id }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border rounded p-3 h-100">
                                <div class="text-muted small mb-1">Jumlah</div>
                                <div class="fw-bold">{{ $dataPemesanan->jumlah }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border rounded p-3 h-100">
                                <div class="text-muted small mb-1">Total Harga</div>
                                <div class="fw-bold">Rp {{ $dataPemesanan->total_harga_rupiah }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border rounded p-3 h-100">
                                <div class="text-muted small mb-1">Nomor HP</div>
                                <div class="fw-bold">{{ $dataPemesanan->nomor_hp }}</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="border rounded p-3 h-100">
                                <div class="text-muted small mb-2">Alamat</div>
                                <div class="lh-lg">{{ $dataPemesanan->alamat }}</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="border rounded p-3 h-100">
                                <div class="text-muted small mb-2">Catatan</div>
                                <div class="lh-lg">{{ $dataPemesanan->catatan ?: '-' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
