<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->increments('pemesanan_id');
            $table->dateTime('tanggal_pesanan');
            $table->string('nama_customer', 200);
            $table->string('nomor_hp', 30);
            $table->unsignedInteger('produk_id');
            $table->unsignedInteger('jumlah');
            $table->unsignedBigInteger('total_harga');
            $table->enum('metode_pembayaran', ['Cash', 'Transfer', 'QRIS']);
            $table->enum('status_pemesanan', ['Menunggu', 'Diproses', 'Selesai', 'Dibatalkan'])->default('Menunggu');
            $table->date('tanggal_pengambilan_pengiriman');
            $table->text('alamat');
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('produk_id')
                ->references('produk_id')
                ->on('produk')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
