<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Produk;
use App\Models\Ulasan;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Schema;

class IndexController extends Controller
{
    public function index()
    {
        $produkQuery = Produk::query()->orderBy('created_at', 'desc');

        if (Schema::hasColumn('produk', 'best_seller')) {
            $produkQuery->where('best_seller', 1);
        }

        $pageData['dataProduk'] = $produkQuery->take(3)->get();
        $pageData['produk'] = Produk::All();
        $pageData['dataUlasan'] = Ulasan::All();

        return view('customer.index', $pageData);
    }

    public function tentang()
    {
        return view('customer.about');
    }

    public function produk()
    {

        $pageData['produk'] = Produk::paginate(6)->withQueryString();
        return view('customer.product', $pageData);
    }

    public function galeri()
    {

        $pageData['galeri'] = Galeri::orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return view('customer.galeri', $pageData);
    }

    public function diskon()
    {
        $diskonProduk = Produk::all()
            ->filter(fn (Produk $produk) => $produk->harga_produk_number < 15000)
            ->values();

        $perPage = 9;
        $currentPage = Paginator::resolveCurrentPage() ?: 1;
        $currentItems = $diskonProduk->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $pageData['produk'] = new LengthAwarePaginator(
            $currentItems,
            $diskonProduk->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('customer.diskon', $pageData);
    }

}
