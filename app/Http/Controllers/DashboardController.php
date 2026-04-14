<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Produk;
use App\Models\Ulasan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $total_user = User::count();
        $total_produk = Produk::count();
        $total_galeri = Galeri::count();

        $produkTerbaru = Produk::orderBy('created_at', 'desc')
            ->take(3)
            ->get(['nama_produk', 'harga_produk', 'foto_produk', 'created_at']);

        $ulasanTerbaru = Ulasan::orderBy('created_at', 'desc')
            ->take(3)
            ->get(['nama_ulasan', 'keterangan_ulasan', 'ulasan', 'created_at']);

        $galeriTerbaru = Galeri::orderBy('created_at', 'desc')
            ->take(6)
            ->get(['galeri', 'created_at']);

        return view('admin.dashboard', compact(
            'total_user',
            'total_produk',
            'total_galeri',
            'produkTerbaru',
            'ulasanTerbaru',
            'galeriTerbaru'
        ));
    }
}
