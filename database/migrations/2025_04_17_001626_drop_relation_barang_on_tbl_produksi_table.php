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
        Schema::table('tbl_produksi', function (Blueprint $table) {
            $table->dropForeign('tbl_produksi_id_barang_foreign');
            $table->dropColumn('id_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_produksi', function (Blueprint $table) {
            $table->string('id_barang', 5)->after('id_produksi');
            $table->foreign('barang')
                ->references('id_barang')
                ->on('tbl_barang')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }
};
