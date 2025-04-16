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
            $table->string('kategori', 5)->after('id_barang');
            $table->foreign('kategori')
                ->references('id_kategori')
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
            $table->dropForeign('tbl_barang_kategori_foreign');
            $table->dropColumn('kategori');
        });
    }
};
