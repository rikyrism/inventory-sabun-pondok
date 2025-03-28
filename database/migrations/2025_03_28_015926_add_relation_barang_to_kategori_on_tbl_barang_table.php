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
            $table->foreignId('id_kategori')->after('id_barang');
            $table->foreign('id_kategori')
                ->references('id')
                ->on('tbl_kategori')
                ->onDelete('cascade');
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
