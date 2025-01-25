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
        Schema::create('tbl_produksi', function (Blueprint $table) {
            $table->string('id_produksi', 5)->primary();
            $table->string('id_barang', 5);
            $table->string('nama_barang', 50);
            $table->integer('jumlah');
            $table->string('satuan', 10);
            $table->date('tanggal');
            $table->string('status')->default('Proses');
            $table->foreign('id_barang')
                ->references('id_barang')
                ->on('tbl_barang')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_produksi');
    }
};
