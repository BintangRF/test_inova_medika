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
        Schema::table('transaksi_tindakans', function (Blueprint $table) {
            $table->integer('jumlah_obat')->nullable()->default(0)->after('obat_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi_tindakans', function (Blueprint $table) {
            $table->dropColumn('jumlah_obat');
        });
    }
};
