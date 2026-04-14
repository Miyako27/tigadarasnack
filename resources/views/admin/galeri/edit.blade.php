@extends('layouts.admin.app')

@section('content')
    {{-- breadcrumb section --}}
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
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">dashboard</a></li>
                    <li class="breadcrumb-item "><a href="{{ route('galeri.list') }}"> Galeri</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Galeri</li>
                </ol>
            </nav>
            <h2 class="h4">Edit Galeri</h2>
            <p class="mb-0">Form Perubahan Galeri </p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('galeri.list') }}" class="btn btn-sm btn-secondary text-white d-inline-flex align-items-center">
                Kembali
            </a>
            {{-- <div class="btn-group ms-2 ms-lg-3">
                <button type="button" class="btn btn-sm btn-outline-gray-600">Share</button>
                <button type="button" class="btn btn-sm btn-outline-gray-600">Export</button>
            </div> --}}
        </div>
    </div>
    {{-- form section --}}
    @if ($errors->any())
        <div class="alert alert-danger"> <!-- bisa ganti warnaa -->
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card card-body border-0 shadow mb-4">
        <h2 class="h5 mb-4">General information</h2>
        <form action="{{ route('galeri.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div>
                        <label for="galeri">Galeri</label>
                        <input class="form-control" id="galeri" type="file" name="galeri" accept="image/*">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="mt-2">
                        <label>Foto Saat Ini:</label>
                        <br>
                        <img src="{{ asset('storage/galeri/' . $dataGaleri->galeri) }}" alt="galeri"
                                class="img-thumbnail" width="100">
                    </div>
                </div>
                <div class="mt-3">
                    <button class="btn btn-info mt-2 animate-up-2" type="submit">Simpan Perubahan</button>
                </div>
                <input type="hidden" name="galeri_id" value="{{ $dataGaleri->galeri_id }}" />
            </div>
        </form>
    </div>
@endsection
