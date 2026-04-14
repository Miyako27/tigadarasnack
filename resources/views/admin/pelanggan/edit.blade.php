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
                <li class="breadcrumb-item"><a href="{{ route('pelanggan.list') }}">Pelanggan</a></li>
                <li class="breadcrumb-item active">Edit Data Pelanggan</li>
            </ol>
        </nav>
        <h2 class="h4">Edit Data Pelanggan</h2>
        <p class="mb-0">Form Edit Data Pelanggan C'3Daraaa</p>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('pelanggan.list') }}"
            class="btn btn-sm btn-secondary text-white d-inline-flex align-items-center">
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
{{-- Error --}}
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
    <form action = "{{ route('pelanggan.update') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <div>
                    <label for="first_name">Nama Depan</label>
                    <input class="form-control" id="first_name" type="text" name="first_name"
                        placeholder="Masukkan Nama Depanmu" value="{{ $dataPelanggan->first_name }}">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div>
                    <label for="last_name">Nama Belakang</label>
                    <input class="form-control" id="last_name" type="text" name="last_name"
                        placeholder="Masukkan Nama Belakangmu" value="{{ $dataPelanggan->last_name }}">
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6 mb-3">
                <label for="birthday">Tanggal Lahir</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <input data-datepicker="" class="form-control datepicker-input" id="birthday" type="date"
                        name="birthday" placeholder="dd/mm/yyyy" value="{{ $dataPelanggan->birthday }}">
                    <div class="datepicker datepicker-dropdown datepicker-orient-left datepicker-orient-bottom"
                        style="left: 341px; top: 375px;">
                        <div class="datepicker-picker">
                            <div class="datepicker-header">
                                <div class="datepicker-title" style="display: none;"></div>
                                <div class="datepicker-controls"><button type="button"
                                        class="btn prev-btn">«</button><button type="button"
                                        class="btn view-switch">October 2024</button><button type="button"
                                        class="btn next-btn">»</button></div>
                            </div>
                            <div class="datepicker-main">
                                <div class="datepicker-view">
                                    <div class="days">
                                        <div class="days-of-week"><span class="dow">Su</span><span
                                                class="dow">Mo</span><span class="dow">Tu</span><span
                                                class="dow">We</span><span class="dow">Th</span><span
                                                class="dow">Fr</span><span class="dow">Sa</span></div>
                                        <div class="datepicker-grid"><span class="datepicker-cell day prev"
                                                data-date="1727542800000">29</span><span
                                                class="datepicker-cell day prev"
                                                data-date="1727629200000">30</span><span class="datepicker-cell day"
                                                data-date="1727715600000">1</span><span class="datepicker-cell day"
                                                data-date="1727802000000">2</span><span class="datepicker-cell day"
                                                data-date="1727888400000">3</span><span class="datepicker-cell day"
                                                data-date="1727974800000">4</span><span class="datepicker-cell day"
                                                data-date="1728061200000">5</span><span class="datepicker-cell day"
                                                data-date="1728147600000">6</span><span class="datepicker-cell day"
                                                data-date="1728234000000">7</span><span class="datepicker-cell day"
                                                data-date="1728320400000">8</span><span class="datepicker-cell day"
                                                data-date="1728406800000">9</span><span class="datepicker-cell day"
                                                data-date="1728493200000">10</span><span class="datepicker-cell day"
                                                data-date="1728579600000">11</span><span class="datepicker-cell day"
                                                data-date="1728666000000">12</span><span class="datepicker-cell day"
                                                data-date="1728752400000">13</span><span class="datepicker-cell day"
                                                data-date="1728838800000">14</span><span
                                                class="datepicker-cell day focused"
                                                data-date="1728925200000">15</span><span class="datepicker-cell day"
                                                data-date="1729011600000">16</span><span class="datepicker-cell day"
                                                data-date="1729098000000">17</span><span class="datepicker-cell day"
                                                data-date="1729184400000">18</span><span class="datepicker-cell day"
                                                data-date="1729270800000">19</span><span class="datepicker-cell day"
                                                data-date="1729357200000">20</span><span class="datepicker-cell day"
                                                data-date="1729443600000">21</span><span class="datepicker-cell day"
                                                data-date="1729530000000">22</span><span class="datepicker-cell day"
                                                data-date="1729616400000">23</span><span class="datepicker-cell day"
                                                data-date="1729702800000">24</span><span class="datepicker-cell day"
                                                data-date="1729789200000">25</span><span class="datepicker-cell day"
                                                data-date="1729875600000">26</span><span class="datepicker-cell day"
                                                data-date="1729962000000">27</span><span class="datepicker-cell day"
                                                data-date="1730048400000">28</span><span class="datepicker-cell day"
                                                data-date="1730134800000">29</span><span class="datepicker-cell day"
                                                data-date="1730221200000">30</span><span class="datepicker-cell day"
                                                data-date="1730307600000">31</span><span
                                                class="datepicker-cell day next"
                                                data-date="1730394000000">1</span><span
                                                class="datepicker-cell day next"
                                                data-date="1730480400000">2</span><span
                                                class="datepicker-cell day next"
                                                data-date="1730566800000">3</span><span
                                                class="datepicker-cell day next"
                                                data-date="1730653200000">4</span><span
                                                class="datepicker-cell day next"
                                                data-date="1730739600000">5</span><span
                                                class="datepicker-cell day next"
                                                data-date="1730826000000">6</span><span
                                                class="datepicker-cell day next"
                                                data-date="1730912400000">7</span><span
                                                class="datepicker-cell day next"
                                                data-date="1730998800000">8</span><span
                                                class="datepicker-cell day next" data-date="1731085200000">9</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="datepicker-footer">
                                <div class="datepicker-controls"><button type="button" class="btn today-btn"
                                        style="display: none;">Today</button><button type="button"
                                        class="btn clear-btn" style="display: none;">Clear</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="gender">Jenis Kelamin</label>
                <select class="form-select mb-0" id="gender" name="gender" aria-label="Gender select example">
                    <option value="Laki-Laki" {{ $dataPelanggan->gender == 'Female' ? 'selected' : '' }}>Laki-Laki
                    </option>
                    <option value="Perempuan {{ $dataPelanggan->gender == 'Male' ? 'selected' : '' }}">Perempuan
                    </option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" id="email" type="email" name="email"
                        placeholder="nama@company.com" value="{{ $dataPelanggan->email }}">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="phone">Nomor HP</label>
                    <input class="form-control" id="phone" type="number" name="phone"
                        placeholder="080000000000" value="{{ $dataPelanggan->phone }}">
                </div>
            </div>
        </div>
        {{-- bagian yang di hapus selum ini --}}
        <div class="mt-3">
            <button class="btn btn-info mt-2 animate-up-2" type="submit">Simpan Perubahan</button>
        </div>
        <input type="hidden" name="pelanggan_id" value="{{ $dataPelanggan->pelanggan_id }}" />
    </form>
</div>
@endsection
