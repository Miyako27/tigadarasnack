<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index(Request $request)
    {
        $pageData['dataPemesanan'] = Pemesanan::with('produk')
            ->filter($request)
            ->orderBy('tanggal_pesanan', 'desc')
            ->paginate(10)
            ->withQueryString();
        $pageData['statusOptions'] = Pemesanan::statusOptions();

        return view('admin.pemesanan.index', $pageData);
    }

    public function create()
    {
        $pageData['dataProduk'] = Produk::orderBy('nama_produk')->get();
        $pageData['metodePembayaranOptions'] = Pemesanan::metodePembayaranOptions();

        return view('admin.pemesanan.create', $pageData);
    }

    public function store(Request $request)
    {
        $validated = $this->validatePemesanan($request);
        $validated['status_pemesanan'] = 'Diproses';
        $validated['total_harga'] = $this->calculateTotalHarga($validated['produk_id'], $validated['jumlah']);

        Pemesanan::create($validated);

        return redirect()->route('pemesanan.list')->with('success', 'Penambahan data pemesanan berhasil!');
    }

    public function show(string $param1)
    {
        $pageData['dataPemesanan'] = Pemesanan::with('produk')->findOrFail($param1);

        return view('admin.pemesanan.show', $pageData);
    }

    public function edit(string $param1)
    {
        $pageData['dataPemesanan'] = Pemesanan::findOrFail($param1);
        $pageData['dataProduk'] = Produk::orderBy('nama_produk')->get();
        $pageData['metodePembayaranOptions'] = Pemesanan::metodePembayaranOptions();

        return view('admin.pemesanan.edit', $pageData);
    }

    public function update(Request $request)
    {
        $validated = $this->validatePemesanan($request);
        $pemesanan = Pemesanan::findOrFail($request->pemesanan_id);
        $validated['status_pemesanan'] = $pemesanan->status_pemesanan;
        $validated['total_harga'] = $this->calculateTotalHarga($validated['produk_id'], $validated['jumlah']);
        $pemesanan->update($validated);

        return redirect()->route('pemesanan.list')->with('success', 'Perubahan data pemesanan berhasil!');
    }

    public function updateStatus(Request $request, string $param1)
    {
        $pemesanan = Pemesanan::findOrFail($param1);

        if ($pemesanan->status_pemesanan === 'Selesai') {
            return redirect()->route('pemesanan.list')->with('error', 'Pesanan yang sudah selesai tidak dapat diubah statusnya.');
        }

        $validated = $request->validate([
            'status_pemesanan' => ['required', 'in:Diproses,Dibatalkan,Selesai'],
        ]);

        $pemesanan->status_pemesanan = $validated['status_pemesanan'];
        $pemesanan->save();

        return redirect()->route('pemesanan.list')->with('success', 'Status pemesanan berhasil diperbarui!');
    }

    public function destroy(string $param1)
    {
        $pemesanan = Pemesanan::findOrFail($param1);
        $pemesanan->delete();

        return redirect()->route('pemesanan.list')->with('success', 'Penghapusan data pemesanan berhasil!');
    }

    private function validatePemesanan(Request $request): array
    {
        return $request->validate([
            'tanggal_pesanan' => ['required', 'date'],
            'nama_customer' => ['required', 'max:200'],
            'nomor_hp' => ['required', 'max:30'],
            'produk_id' => ['required', 'exists:produk,produk_id'],
            'jumlah' => ['required', 'integer', 'min:1'],
            'metode_pembayaran' => ['required', 'in:Cash,Transfer,QRIS'],
            'tanggal_pengambilan_pengiriman' => ['required', 'date'],
            'alamat' => ['required', 'max:1000'],
            'catatan' => ['nullable', 'max:1000'],
        ]);
    }

    private function calculateTotalHarga(int $produkId, int $jumlah): int
    {
        $produk = Produk::findOrFail($produkId);

        return $produk->harga_produk_number * $jumlah;
    }
}
