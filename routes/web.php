<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;

Route::get('/', function () {
    return view('welcome');
});

// resource gunanya mendeteksi get/post (auto deteksi)
//Route::resource('home', IndexController::class);

//Login
Route::get('/login', [LoginController::class, 'index'])->name('auth');
Route::POST('/login/login', [LoginController::class, 'login'])->name('login');

Route::get('/login/home', [LoginController::class, 'loginHome'])->name('login.home');
Route::get('/login/forgot', [LoginController::class, 'show_forgot_password'])->name('login.forgot');
Route::POST('/login/forgot/do', [LoginController::class, 'do_forgot_password'])->name('login.do-forgot');

Route::get('/daftar', [DaftarController::class, 'index']);
Route::POST('/daftar/redirect', [DaftarController::class, 'daftar'])->name('daftar');
//Route::resource('login', LoginController::class);

//middleware
Route::group(['middleware' => ['checkislogin']], function () {
    //P6 route ke dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //route untuk PelangganController

    //untuk menampilkan index pelangan
    Route::get('pelanggan', [PelangganController::class, 'index'])->name('pelanggan.list');
    //untuk menampilkan form data pelanggan
    Route::get('pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    //untuk mengirim data pelanggan ke PelangganController pakai dd
    Route::POST('pelanggan/store', [PelangganController::class, 'store'])->name('pelanggan.store');

    //pertemuan 7
    Route::get('pelanggan/edit/{param1}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::post('pelanggan/update', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::get('pelanggan/destroy/{param1}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

    //Tugas pertemuan 7 - Mitra
    //route untuk PelangganController

    //untuk menampilkan index pelangan
    Route::get('mitra', [MitraController::class, 'index'])->name('mitra.list');
    //untuk menampilkan form data pelanggan
    Route::get('mitra/create', [MitraController::class, 'create'])->name('mitra.create');
    //untuk mengirim data pelanggan ke PelangganController pakai dd
    Route::POST('mitra/store', [MitraController::class, 'store'])->name('mitra.store');

    Route::get('mitra/edit/{param1}', [MitraController::class, 'edit'])->name('mitra.edit');
    Route::post('mitra/update', [MitraController::class, 'update'])->name('mitra.update');
    Route::get('mitra/destroy/{param1}', [MitraController::class, 'destroy'])->name('mitra.destroy');

    //route untuk ProdukController

    //untuk menampilkan index produk
    Route::get('produk', [ProdukController::class, 'index'])->name('produk.list');
    //untuk menampilkan form data produk
    Route::get('produk/create', [ProdukController::class, 'create'])->name('produk.create');
    //untuk mengirim data produk ke ProdukController pakai dd
    Route::POST('produk/store', [ProdukController::class, 'store'])->name('produk.store');

    Route::get('produk/edit/{param1}', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::post('produk/update', [ProdukController::class, 'update'])->name('produk.update');
    Route::get('produk/destroy/{param1}', [ProdukController::class, 'destroy'])->name('produk.destroy');

    //route untuk UlasanController

    //untuk menampilkan index ulasan
    Route::get('ulasan', [UlasanController::class, 'index'])->name('ulasan.list');
    //untuk menampilkan form data ulasan
    Route::get('ulasan/create', [UlasanController::class, 'create'])->name('ulasan.create');
    //untuk mengirim data ulasan ke UlasanController pakai dd
    Route::POST('ulasan/store', [UlasanController::class, 'store'])->name('ulasan.store');

    Route::get('ulasan/edit/{param1}', [UlasanController::class, 'edit'])->name('ulasan.edit');
    Route::post('ulasan/update', [UlasanController::class, 'update'])->name('ulasan.update');
    Route::get('ulasan/destroy/{param1}', [UlasanController::class, 'destroy'])->name('ulasan.destroy');

    //route untuk GaleriController

    //untuk menampilkan index pelangan
    Route::get('galeri', [GaleriController::class, 'index'])->name('galeri.list');
    //untuk menampilkan form data pelanggan
    Route::get('galeri/create', [GaleriController::class, 'create'])->name('galeri.create');
    //untuk mengirim data pelanggan ke PelangganController pakai dd
    Route::POST('galeri/store', [GaleriController::class, 'store'])->name('galeri.store');

    //pertemuan 7
    Route::get('galeri/edit/{param1}', [GaleriController::class, 'edit'])->name('galeri.edit');
    Route::post('galeri/update', [GaleriController::class, 'update'])->name('galeri.update');
    Route::get('galeri/destroy/{param1}', [GaleriController::class, 'destroy'])->name('galeri.destroy');

    //Logout
    Route::get('/login/logout', [LoginController::class, 'logout'])->name('login.logout');

    Route::group(['middleware' => ['checkrole:SuperAdministrator']], function () {
        //User
        Route::get('user', [UserController::class, 'index'])->name('user.list');
        Route::get('user/create', [UserController::class, 'create'])->name('user.create');
        Route::POST('user/store', [UserController::class, 'store'])->name('user.store');
        Route::get('user/edit/{param1}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('user/update', [UserController::class, 'update'])->name('user.update');
        Route::get('user/destroy/{param1}', [UserController::class, 'destroy'])->name('user.destroy');
    });
});

//Login With Google
Route::get('/auth/redirect-google', [LoginController::class, 'redirectToGoogle'])->name('redirect.google');
Route::get('/oauthcallback', [LoginController::class, 'handleGoogleCallback']);

//home
Route::get('/home', [IndexController::class, 'index'])->name('home');

Route::get('/tentang', [IndexController::class, 'tentang'])->name('tentang');

Route::get('/product', [IndexController::class, 'produk'])->name('product');

Route::get('/gallery', [IndexController::class, 'galeri'])->name('home.galeri');

Route::get('/diskon', [IndexController::class, 'diskon'])->name('diskon');

//Versi PHP
Route::get('/version', function () {
    phpinfo();
});
