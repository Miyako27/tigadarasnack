<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $searchableColumns = ['nama_produk'];

        $pageData['dataProduk'] = Produk::filter($request, $searchableColumns)->paginate(3)->withQueryString();
        return view('admin.produk.index', $pageData);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageData['data-produk'] = Produk::all();
        return view('admin.produk.create', $pageData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'foto_produk' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:1024'],
            'nama_produk' => ['required', 'max:200'],
            'harga_produk' => ['required', 'max:200'],
            'deskripsi_produk' => ['nullable', 'max:1000'],
            'best_seller' => ['nullable', 'boolean'],
        ]);

        // Membuat array data
        $data = [
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'best_seller' => $request->has('best_seller') ? 1 : 0,
        ];

        // Proses upload produk jika ada
        if ($request->hasFile('foto_produk')) {
            // Membuat nama unik untuk file gambar
            $produkName = time() . '.' . $request->foto_produk->extension();

            // Memindahkan file ke folder public/storage/produk
            $request->foto_produk->move(public_path('storage/produk'), $produkName);

            // Menyimpan nama file ke dalam data
            $data['foto_produk'] = $produkName; // Pastikan menggunakan 'foto_produk' sesuai dengan nama kolom di database
        }
        // Menyimpan data ke dalam database
        Produk::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('produk.list')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $param1)
    {
        $pageData['dataProduk'] = Produk::findOrFail($param1);
        return view('admin.produk.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'foto_produk' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:1024'],
            'nama_produk' => ['required', 'max:200'],
            'harga_produk' => ['required', 'max:200'],
            'deskripsi_produk' => ['nullable', 'max:1000'],
            'best_seller' => ['nullable', 'boolean'],
        ]);

        $produk_id = $request->produk_id;
        $produk = Produk::findOrFail($produk_id);

        // Update atribut produk
        $produk->nama_produk = $request->nama_produk;
        $produk->harga_produk = $request->harga_produk;
        $produk->deskripsi_produk = $request->deskripsi_produk;
        $produk->best_seller = $request->has('best_seller') ? 1 : 0;

        // Update foto produk jika file baru diunggah
        if ($request->hasFile('foto_produk')) {
            // Hapus file foto lama jika ada
            if ($produk->foto_produk && file_exists(public_path('storage/produk/' . $produk->foto_produk))) {
                unlink(public_path('storage/produk/' . $produk->foto_produk));
            }

            // Simpan file foto baru
            $produkName = time() . '.' . $request->foto_produk->extension();
            $request->foto_produk->move(public_path('storage/produk'), $produkName);
            $produk->foto_produk = $produkName;
        }

        // Simpan perubahan ke database
        $produk->save();

        return redirect()->route('produk.list')->with('success', 'Perubahan Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $param1)
    {
        $user = Produk::findOrFail($param1);
        $user->delete();
        return redirect()->route('produk.list')->with('success', 'Penghapusan Data Berhasil!');
    }

}
