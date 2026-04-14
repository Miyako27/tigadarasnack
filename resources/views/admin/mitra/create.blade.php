@extends('layouts.admin.app')

@section('content')
{{-- Breadcrumb --}}
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
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
                <li class="breadcrumb-item"><a href="{{ route('mitra.list') }}"> Data Mitra</a></li>
                <li class="breadcrumb-item active">Form Data Mitra</li>
            </ol>
        </nav>
        <h2 class="h4">Data Mitra</h2>
        <p class="mb-0">Tambahkan Data Mitra C'3Daraaa</p>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('mitra.list') }}" class="btn btn-sm btn-secondary text-white d-inline-flex align-items-center">
            <svg class="" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            Kembali
        </a>
        {{-- <div class="btn-group ms-2 ms-lg-3">
            <button type="button" class="btn btn-sm btn-outline-gray-600">Bagikan</button>
            <button type="button" class="btn btn-sm btn-outline-gray-600">Expor</button>
        </div> --}}
    </div>
</div>

{{-- Form Section --}}
{{-- Flash Data Error --}}
@if ($errors->any())
    <div class="alert alert-danger"> ​ <!-- bisa ganti warnaa -->
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card card-body border-0 shadow mb-4">
    <h2 class="h5 mb-4">Informasi Umum</h2>
    <form action="{{ route('mitra.store') }}" method="POST">
        @csrf
        <div class="row">
            <!-- Nama Mitra -->
            <div class="col-md-12 mb-3">
                <label for="nama_mitra">Nama Mitra</label>
                <input class="form-control" id="nama_mitra" type="text" name="nama_mitra"
                    placeholder="Masukkan Nama">
            </div>
        </div>

        <div class="row">
            <!-- Alamat -->
            <div class="col-md-12 mb-3">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" rows="3"></textarea>
            </div>
        </div>

        <div class="row">
            <!-- Email -->
            <div class="col-md-6 mb-3">
                <label for="email">Email</label>
                <input class="form-control" id="email" type="email" name="email" placeholder="nama@company.com">
            </div>

            <!-- Nomor Telepon -->
            <div class="col-md-6 mb-3">
                <label for="nomor_hp">Nomor Telepon</label>
                <input class="form-control" id="nomor_hp" type="number" name="nomor_hp" placeholder="080000000000">
            </div>
        </div>

        <div class="row">
            <!-- Jenis Kemitraan -->
            <div class="col-md-6 mb-3">
                <label for="jenis_kemitraan">Jenis Kemitraan</label>
                <select class="form-select mb-0" id="jenis_kemitraan" name="jenis_kemitraan"
                    aria-label="Gender select example">
                    <option selected>Pilih Jenis Kemitraan</option>
                    <option value="Platinum">Platinum</option>
                    <option value="Gold">Gold</option>
                    <option value="Silver">Silver</option>
                </select>
            </div>

            <!-- Tanggal Bergabung -->
            <div class="col-md-6 mb-3">
                <label for="tanggal_bergabung">Tanggal Bergabung</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <input data-datepicker="" class="form-control datepicker-input" id="tanggal_bergabung"
                        type="date" name="tanggal_bergabung" placeholder="dd/mm/yyyy">
                </div>
            </div>
        </div>

        <!-- Checkbox untuk konfirmasi kebenaran data -->
        <div class="form-check mt-3">
            <input class="form-check-input" type="checkbox" id="data_valid" name="data_valid">
            <label class="form-check-label" for="data_valid">
                Data ini benar dan dapat dipertanggungjawabkan dengan semestinya
            </label>
        </div>

        <div class="mt-3">
            <button class="btn btn-info mt-2 animate-up-2" type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection
