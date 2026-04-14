<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use App\Models\Produk;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        // //Penerapan Auth::check()
        // if (!Auth::check()) {
        //     return redirect()->route('auth');
        // }

        // Menghitung total mitra, pelanggan, dan user
        $total_mitra = Mitra::count();
        $total_pelanggan = Pelanggan::count();
        $total_user = User::count();

        $user = User::orderBy('created_at', 'desc')
            ->take(2)
            ->get(['name', 'role', 'avatar']);

        // Mengambil 3 pelanggan terbaru berdasarkan tanggal pendaftaran
        $top_pelanggan = Pelanggan::orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // Mengambil 3 pelanggan terbaru
        $pelangganTerbaru = Pelanggan::orderBy('created_at', 'desc')
            ->take(3)
            ->get(['first_name', 'email', 'created_at']);

        // Mengambil 3 produk terbaru beserta gambar
        $produkTerbaru = Produk::orderBy('created_at', 'desc')
            ->take(3)
            ->get(['nama_produk', 'harga_produk', 'foto_produk', 'created_at']);

        // Mengirim data ke view
        return view('admin.dashboard', compact(
            'total_mitra', 'total_pelanggan',
            'total_user', 'top_pelanggan', 'pelangganTerbaru',
            'produkTerbaru', 'user'));
        //return view('admin.dashboard');
    }
}
