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
        Schema::create('tbl_barang', function (Blueprint $table) {
            $table->string('id_barang', 5)->primary();
            $table->string('nama_barang', false, false)->length(50);
            $table->integer('stok_minimum', false, false)->length(3);
            $table->integer('stok', false, false)->length(3)->default(0);
            $table->string('satuan', 10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_barang');
    }
};
