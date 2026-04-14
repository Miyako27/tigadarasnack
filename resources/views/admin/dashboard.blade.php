@extends('layouts.admin.app')

@section('content')
    <div class="py-3">
    </div>

    <div class="row">
        <div class="col-12 col-xl-8">
            <div class="row">
                <div class="col-12 mb-0">
                    {{-- Ini Card 3 --}}
                    <div class="row mb-4">
                        <!-- Total Mitra -->
                        <div class="col-md-4">
                            <div class="card border-0 shadow text-center" style="background-color: #ffe6e6;">
                                <div class="card-body">
                                    <div class="icon1 mb-3">
                                        <img src="{{ asset('assets-admin/assets/img/icon-mitra.png') }}" height="23"
                                            width="23" alt="Mitra">
                                    </div>
                                    <h5 class="fw-bold mb-1 text-nowrap">Total Mitra</h5>
                                    <h3 class="fw-bold mb-2">
                                        <?php echo $total_mitra; ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- Total Pelanggan -->
                        <div class="col-md-4">
                            <div class="card border-0 shadow text-center" style="background-color: #ffffcc;">
                                <div class="card-body">
                                    <div class="icon1 mb-3">
                                        <img src="{{ asset('assets-admin/assets/img/icon-pelanggan.png') }}" height="23"
                                            width="23" alt="Pelanggan">
                                    </div>
                                    <h5 class="fw-bold mb-1 text-nowrap">Total Pelanggan</h5>
                                    <h3 class="fw-bold mb-2">
                                        <?php echo $total_pelanggan; ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- Total User -->
                        <div class="col-md-4">
                            <div class="card border-0 shadow text-center" style="background-color: #e6f7ff;">
                                <div class="card-body">
                                    <div class="icon1 mb-3">
                                        <img src="{{ asset('assets-admin/assets/img/icon-user.png') }}" height="23"
                                            width="23" alt="User">
                                    </div>
                                    <h5 class="fw-bold mb-1 text-nowrap">Total User</h5>
                                    <h3 class="fw-bold mb-2">
                                        <?php echo $total_user; ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Anggota Tim --}}
                <div class="container mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h2 class="fs-5 fw-bold mb-2" style="color: #F195B2;">Anggota Tim</h2>
                            @if ($user->isEmpty())
                                <p class="text-muted text-center">Belum ada anggota tim.</p>
                            @else
                                <ul class="list-group list-group-flush">
                                    @foreach ($user as $dataUser)
                                        <li class="list-group-item d-flex justify-content-between align-items-center py-3"
                                            style="background-color: #f9f9f9; border: none;">
                                            <div class="d-flex align-items-center">
                                                {{-- Avatar --}}
                                                <img src="{{ asset('storage/avatars/' . ($dataUser->avatar ? $dataUser->avatar : 'icon-user.png')) }}"
                                                    alt="Gambar {{ $dataUser->name }}"
                                                    style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%; margin-right: 15px; border: 2px solid #F195B2;">
                                                {{-- Info Anggota --}}
                                                <div>
                                                    <strong class="d-block">{{ $dataUser->name }}</strong>
                                                    <small class="text-muted">{{ $dataUser->role }}</small>
                                                </div>
                                            </div>

                                            {{-- Date Badge --}}
                                            {{-- <span class="badge bg-primary rounded-pill" style="font-size: 0.8em;">
                                                {{ \Carbon\Carbon::parse($dataUser->created_at)->format('d M Y') }}
                                            </span> --}}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="col-12 px-0 mb-4">
                <div class="card shadow border-0 text-center p-0">
                    <div class="profile-cover rounded-top" data-background="assets-admin/assets/img/bg-3.jpg"
                        style="background: url(&quot;assets-admin/assets/img/bg-3.jpg&quot;);"></div>
                    <div class="card-body pb-6">
                        <img src="{{ asset('storage/avatars/' . (Auth::user()->avatar ? Auth::user()->avatar : 'icon-user.png')) }}"
                            class="avatar-xl rounded-circle mx-auto mt-n7 mb-4" alt="Neil Portrait" style="border-radius: 50%; margin-right: 15px; border: 2px solid #F195B2;">
                        <h4 class="h3">{{ Auth::user()->name }}</h4>
                        <h6 class="h6">{{ Auth::user()->role }}</h6>
                    </div>
                </div>
            </div>
        </div>
        {{-- Bawah --}}
        <!-- Pelanggan terbaru -->
        <div class="col-12 col-xxl-6 mb-1">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h2 class="fs-5 fw-bold mb-2" style="color: #F195B2;">Pelanggan Terbaru</h2>
                    {{-- <h2 class="fs-5 fw-bold mb-2">Pelanggan Terbaru</h2> --}}
                    @if ($pelangganTerbaru->isEmpty())
                        <p class="text-muted">Belum ada pelanggan terbaru.</p>
                    @else
                        <ul class="list-group">
                            @foreach ($pelangganTerbaru as $dataPelanggan)
                                <li class="list-group-item d-flex justify-content-between align-items-center"
                                    style="border: none; background-color: #f9f9f9;">
                                    <div>
                                        <strong>{{ $dataPelanggan->first_name }}</strong>
                                        <p class="mb-0 text-muted" style="font-size: 0.9em;">
                                            {{ $dataPelanggan->email }}
                                        </p>
                                    </div>
                                    <span class="badge bg-primary" style="font-size: 0.8em;">
                                        {{ \Carbon\Carbon::parse($dataPelanggan->created_at)->format('d M Y') }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
        {{-- Produk Terbaru --}}
        <div class="container mb-4 mt-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h2 class="fs-5 fw-bold mb-2" style="color: #F195B2;">Produk Terbaru Di Input</h2>

                    @if ($produkTerbaru->isEmpty())
                        <p class="text-muted text-center">Belum ada produk terbaru.</p>
                    @else
                        <ul class="list-group list-group-flush">
                            @foreach ($produkTerbaru as $dataProduk)
                                <li class="list-group-item d-flex justify-content-between align-items-center py-3"
                                    style="background-color: #f9f9f9; border: none;">
                                    <div class="d-flex align-items-center">
                                        {{-- Product Image --}}
                                        <img src="{{ asset('storage/produk/' . $dataProduk->foto_produk) }}"
                                            alt="Gambar {{ $dataProduk->nama_produk }}"
                                            style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px; margin-right: 15px;">

                                        {{-- Product Info --}}
                                        <div>
                                            <strong class="d-block">{{ $dataProduk->nama_produk }}</strong>
                                            <small class="text-muted">Rp
                                                {{ $dataProduk->harga_produk }}</small>
                                        </div>
                                    </div>

                                    {{-- Date Badge --}}
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
    @endsection
