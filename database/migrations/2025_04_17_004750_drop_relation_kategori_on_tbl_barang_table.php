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
        Schema::table('tbl_barang', function (Blueprint $table) {
            $table->dropForeign('tbl_barang_id_kategori_foreign');
            $table->dropColumn('id_kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_barang', function (Blueprint $table) {
            $table->dropForeign('tbl_barang_id_kategori_foreign');
            $table->dropColumn('id_kategori');
        });
    }
};
