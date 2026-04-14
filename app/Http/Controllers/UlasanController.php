<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColumns = ['nama_ulasan'];

        $searchableColumns = ['nama_ulasan'];

        $pageData['dataUlasan'] = Ulasan::filter($request, $filterableColumns, $searchableColumns)->paginate(2)->withQueryString();
        return view('admin.ulasan.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $pageData['data-ulasan'] = Ulasan::all();
        return view('admin.ulasan.create', $pageData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_ulasan' => ['required', 'max:100'],
            'keterangan_ulasan' => ['required', 'max:100'],
            'ulasan' => ['required', 'max:1000'],
        ]);

        // Membuat array data
        $data = [
            'nama_ulasan' => $request->nama_ulasan,
            'keterangan_ulasan' => $request->keterangan_ulasan,
            'ulasan' => $request->ulasan,
        ];

        // Menyimpan data ke dalam database
        Ulasan::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('ulasan.list')->with('success', 'Penambahan Data Berhasil!');
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
        $pageData['dataUlasan'] = Ulasan::findOrFail($param1);
        return view('admin.ulasan.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_ulasan' => ['required', 'max:100'],
            'keterangan_ulasan' => ['required', 'max:100'],
            'ulasan' => ['required', 'max:1000'],
        ]);

        $ulasan_id = $request->ulasan_id;
        $ulasan = Ulasan::findOrFail($ulasan_id);

        $ulasan->nama_ulasan = $request->nama_ulasan;
        $ulasan->keterangan_ulasan = $request->keterangan_ulasan;
        $ulasan->ulasan = $request->ulasan;

        $ulasan->save();

        return redirect()->route('ulasan.list')->with('success', 'Perubahan Data Berhasil');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $param1)
    {
        $user = Ulasan::findOrFail($param1);
        $user->delete();
        return redirect()->route('ulasan.list')->with('success', 'Penghapusan Data Berhasil!');

    }
}
