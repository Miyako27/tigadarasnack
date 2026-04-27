@extends('layouts.admin.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <h2 class="h4">Manajemen Pemesanan</h2>
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
                    <li class="breadcrumb-item active" aria-current="page">Pemesanan</li>
                </ol>
            </nav>

        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('pemesanan.create') }}"
                class="btn btn-sm btn-success text-white d-inline-flex align-items-center">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Tambah Data
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="mb-3">
                <form method="GET" action="{{ route('pemesanan.list') }}">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <select name="status_pemesanan" onchange="this.form.submit()" class="form-select">
                                <option value="">Semua Status</option>
                                @foreach ($statusOptions as $statusOption)
                                    <option value="{{ $statusOption }}"
                                        {{ request('status_pemesanan') === $statusOption ? 'selected' : '' }}>
                                        {{ $statusOption }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5">
                            <div class="input-group">
                                <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                    placeholder="Cari customer, nomor HP, atau produk">
                                <button type="submit" class="input-group-text" id="basic-addon2">
                                    <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                @if (request('search') || request('status_pemesanan'))
                                    <a href="{{ url()->current() }}" class="btn btn-outline-danger ms-2">Clear</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">No</th>
                            <th class="border-0">Tanggal Pesanan</th>
                            <th class="border-0">Nama Customer</th>
                            <th class="border-0">Produk</th>
                            <th class="border-0">Jumlah</th>
                            <th class="border-0">Total Harga</th>
                            <th class="border-0">Tanggal Pengiriman</th>
                            <th class="border-0">Status Pesanan</th>
                            <th class="border-0 rounded-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataPemesanan as $row)
                            @php
                                $isSelesai = $row->status_pemesanan === 'Selesai';
                            @endphp
                            <tr>
                                <td>{{ ($dataPemesanan->currentPage() - 1) * $dataPemesanan->perPage() + $loop->iteration }}</td>
                                <td>{{ $row->tanggal_pesanan->format('d/m/Y H:i') }}</td>
                                <td>{{ $row->nama_customer }}</td>
                                <td>{{ $row->produk?->nama_produk ?? '-' }}</td>
                                <td>{{ $row->jumlah }}</td>
                                <td>Rp {{ $row->total_harga_rupiah }}</td>
                                <td>{{ $row->tanggal_pengambilan_pengiriman->format('d/m/Y') }}</td>
                                <td>
                                    <span class="badge {{ $row->status_badge_class }}">{{ $row->status_pemesanan }}</span>
                                </td>
                                <td>
                                    <div class="d-flex flex-wrap gap-1">
                                        <a href="{{ route('pemesanan.show', $row->pemesanan_id) }}"
                                            class="btn btn-info btn-sm text-white" title="Lihat Detail">
                                            <svg class="icon icon-xs" fill="none" stroke-width="1.5" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.964-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0Z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('pemesanan.edit', $row->pemesanan_id) }}"
                                            class="btn btn-warning btn-sm {{ $isSelesai ? 'disabled btn-secondary border-secondary text-white' : '' }}"
                                            title="Edit" {{ $isSelesai ? 'aria-disabled=true tabindex=-1' : '' }}>
                                            <svg class="icon icon-xs" fill="none" stroke-width="1.5" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('pemesanan.update-status', $row->pemesanan_id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            <button type="button"
                                                class="btn btn-primary btn-sm {{ $isSelesai ? 'btn-secondary border-secondary text-white' : '' }}"
                                                title="Ubah Status" {{ $isSelesai ? 'disabled' : '' }}
                                                data-bs-toggle="modal" data-bs-target="#statusModal{{ $row->pemesanan_id }}">
                                                <svg class="icon icon-xs" fill="none" stroke-width="1.5"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.023 9.348h4.992V4.356m-1.636 13.92A9 9 0 1119.5 8.25l1.515 1.098M2.985 14.652H7.977v4.992m1.636-13.92A9 9 0 014.5 15.75l-1.515-1.098" />
                                                </svg>
                                            </button>

                                            @unless ($isSelesai)
                                                <div class="modal fade" id="statusModal{{ $row->pemesanan_id }}" tabindex="-1"
                                                    aria-labelledby="statusModalLabel{{ $row->pemesanan_id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="statusModalLabel{{ $row->pemesanan_id }}">
                                                                    Ubah Status Pemesanan
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-start">
                                                                <div class="mb-3">
                                                                    <div class="small text-muted mb-1">Customer</div>
                                                                    <div class="fw-bold">{{ $row->nama_customer }}</div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="small text-muted mb-1">Produk</div>
                                                                    <div>{{ $row->produk?->nama_produk ?? '-' }}</div>
                                                                </div>
                                                                <div class="mb-0">
                                                                    <label for="status_pemesanan_{{ $row->pemesanan_id }}"
                                                                        class="form-label">Status Pemesanan</label>
                                                                    <select class="form-select"
                                                                        id="status_pemesanan_{{ $row->pemesanan_id }}"
                                                                        name="status_pemesanan">
                                                                        @foreach ($statusOptions as $statusOption)
                                                                            <option value="{{ $statusOption }}"
                                                                                {{ $row->status_pemesanan === $statusOption ? 'selected' : '' }}>
                                                                                {{ $statusOption }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary">Simpan
                                                                    Status</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endunless
                                        </form>
                                        <a href="{{ route('pemesanan.destroy', $row->pemesanan_id) }}"
                                            class="btn btn-danger btn-sm {{ $isSelesai ? 'disabled btn-secondary border-secondary text-white' : '' }}"
                                            title="Hapus" {{ $isSelesai ? 'aria-disabled=true tabindex=-1' : '' }}>
                                            <svg class="icon icon-xs" fill="none" stroke-width="1.5" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-4">Belum ada data pemesanan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $dataPemesanan->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
