<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Produk;
use App\Models\Ulasan;

class IndexController extends Controller
{
    public function index()
    {

        $pageData['dataProduk'] = Produk::where('best_seller', 1)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
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

        $pageData['produk'] = Produk::where('harga_produk', '<', 15)->paginate(9);
        return view('customer.diskon', $pageData);
    }

}
