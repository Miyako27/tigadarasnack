<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('pemesanan')
            ->where('status_pemesanan', 'Menunggu')
            ->update(['status_pemesanan' => 'Diproses']);

        DB::statement("
            ALTER TABLE pemesanan
            MODIFY status_pemesanan ENUM('Diproses', 'Dibatalkan', 'Selesai')
            NOT NULL DEFAULT 'Diproses'
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("
            ALTER TABLE pemesanan
            MODIFY status_pemesanan ENUM('Menunggu', 'Diproses', 'Selesai', 'Dibatalkan')
            NOT NULL DEFAULT 'Menunggu'
        ");
    }
};
