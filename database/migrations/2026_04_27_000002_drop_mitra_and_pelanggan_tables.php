<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('users')
            ->whereIn('role', ['Pelanggan', 'Mitra'])
            ->update(['role' => 'Administrator']);

        Schema::dropIfExists('mitra');
        Schema::dropIfExists('pelanggan');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
