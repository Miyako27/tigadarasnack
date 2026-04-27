@php
    $selectedProdukId = old('produk_id', $dataPemesanan->produk_id ?? '');
    $selectedProduk = $dataProduk->firstWhere('produk_id', (int) $selectedProdukId);
    $initialTotal = old('total_harga_display', isset($dataPemesanan) ? $dataPemesanan->total_harga_rupiah : ($selectedProduk ? number_format($selectedProduk->harga_produk_number, 0, ',', '.') : '0'));
@endphp

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="tanggal_pesanan">Tanggal Pesanan</label>
        <input class="form-control" id="tanggal_pesanan" type="datetime-local" name="tanggal_pesanan"
            value="{{ old('tanggal_pesanan', isset($dataPemesanan) ? $dataPemesanan->tanggal_pesanan->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}">
    </div>

    <div class="col-md-6 mb-3">
        <label for="nama_customer">Nama Customer</label>
        <input class="form-control" id="nama_customer" type="text" name="nama_customer"
            placeholder="Masukkan nama customer" value="{{ old('nama_customer', $dataPemesanan->nama_customer ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label for="nomor_hp">Nomor HP</label>
        <input class="form-control" id="nomor_hp" type="text" name="nomor_hp"
            placeholder="08xxxxxxxxxx" value="{{ old('nomor_hp', $dataPemesanan->nomor_hp ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label for="produk_id">Produk</label>
        <select class="form-select" id="produk_id" name="produk_id">
            <option value="">Pilih Produk</option>
            @foreach ($dataProduk as $produk)
                <option value="{{ $produk->produk_id }}" data-harga="{{ $produk->harga_produk_number }}"
                    {{ (string) $selectedProdukId === (string) $produk->produk_id ? 'selected' : '' }}>
                    {{ $produk->nama_produk }} - Rp {{ $produk->harga_produk_rupiah }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4 mb-3">
        <label for="jumlah">Jumlah</label>
        <input class="form-control" id="jumlah" type="number" min="1" name="jumlah"
            value="{{ old('jumlah', $dataPemesanan->jumlah ?? 1) }}">
    </div>

    <div class="col-md-4 mb-3">
        <label for="metode_pembayaran">Metode Pembayaran</label>
        <select class="form-select" id="metode_pembayaran" name="metode_pembayaran">
            <option value="">Pilih Metode</option>
            @foreach ($metodePembayaranOptions as $metodePembayaran)
                <option value="{{ $metodePembayaran }}"
                    {{ old('metode_pembayaran', $dataPemesanan->metode_pembayaran ?? '') === $metodePembayaran ? 'selected' : '' }}>
                    {{ $metodePembayaran }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-8 mb-3">
        <label for="total_harga_display">Total Harga</label>
        <input class="form-control bg-light" id="total_harga_display" type="text" value="Rp {{ $initialTotal }}"
            readonly>
    </div>

    <div class="col-md-6 mb-3">
        <label for="tanggal_pengambilan_pengiriman">Tanggal Pengambilan / Pengiriman</label>
        <input class="form-control" id="tanggal_pengambilan_pengiriman" type="date"
            name="tanggal_pengambilan_pengiriman"
            value="{{ old('tanggal_pengambilan_pengiriman', isset($dataPemesanan) ? $dataPemesanan->tanggal_pengambilan_pengiriman->format('Y-m-d') : '') }}">
    </div>

    <div class="col-md-12 mb-3">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3"
            placeholder="Masukkan alamat pengiriman atau pengambilan">{{ old('alamat', $dataPemesanan->alamat ?? '') }}</textarea>
    </div>

    <div class="col-md-12 mb-3">
        <label for="catatan">Catatan</label>
        <textarea class="form-control" id="catatan" name="catatan" rows="3"
            placeholder="Catatan tambahan untuk pesanan">{{ old('catatan', $dataPemesanan->catatan ?? '') }}</textarea>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const produkSelect = document.getElementById('produk_id');
        const jumlahInput = document.getElementById('jumlah');
        const totalHargaDisplay = document.getElementById('total_harga_display');

        const formatRupiah = (value) => new Intl.NumberFormat('id-ID').format(value);

        const updateTotalHarga = () => {
            const selectedOption = produkSelect.options[produkSelect.selectedIndex];
            const hargaProduk = Number(selectedOption?.dataset?.harga || 0);
            const jumlah = Number(jumlahInput.value || 0);
            const total = hargaProduk * jumlah;

            totalHargaDisplay.value = `Rp ${formatRupiah(total)}`;
        };

        produkSelect.addEventListener('change', updateTotalHarga);
        jumlahInput.addEventListener('input', updateTotalHarga);

        updateTotalHarga();
    });
</script>
