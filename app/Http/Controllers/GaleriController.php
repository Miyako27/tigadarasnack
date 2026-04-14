<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColumns = ['galeri'];

        $searchableColumns = ['galeri'];

        $pageData['dataGaleri'] = Galeri::filter($request, $filterableColumns, $searchableColumns)->paginate(3)->withQueryString();
        return view('admin.galeri.index', $pageData);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageData['dataGaleri'] = Galeri::all();
        return view('admin.galeri.create', $pageData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'galeri' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // Proses upload galeri jika ada
        if ($request->hasFile('galeri')) {
            // Membuat nama unik untuk file gambar
            $galeriName = time() . '.' . $request->galeri->extension();

            // Memindahkan file ke folder public/storage/galeri
            $request->galeri->move(public_path('storage/galeri'), $galeriName);

            // Menyimpan nama file ke dalam data
            $data['galeri'] = $galeriName;
        }

        // Menyimpan data ke dalam database
        Galeri::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('galeri.list')->with('success', 'Penambahan Data Berhasil!');
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
        $pageData['dataGaleri'] = Galeri::findOrFail($param1);
        return view('admin.galeri.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'galeri' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $galeri_id = $request->galeri_id;
        $galeri = Galeri::findOrFail($galeri_id);

        // Update galeri jika ada
        if ($request->hasFile('galeri')) {
            // Hapus galeri lama jika ada
            if ($galeri->galeri && file_exists(public_path('storage/galeri/' . $galeri->galeri))) {
                unlink(public_path('storage/galeri/' . $galeri->galeri));
            }

            // Simpan galeri baru
            $galeriName = time() . '.' . $request->galeri->extension();
            $request->galeri->move(public_path('storage/galeri'), $galeriName);
            $galeri->galeri = $galeriName;
        }
        $galeri->save();

        return redirect()->route('galeri.list')->with('success', 'Perubahan Data Berhasil');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $param1)
    {
        $user = Galeri::findOrFail($param1);
        $user->delete();
        return redirect()->route('galeri.list')->with('success', 'Penghapusan Data Berhasil!');
    }
}
