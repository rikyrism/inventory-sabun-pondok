<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE TRIGGER `stok_masuk` AFTER INSERT ON `barang_masuks` FOR EACH ROW BEGIN
                UPDATE barangs SET stok=stok+NEW.jumlah WHERE id=NEW.barang_id;
            END;
        ');
        DB::unprepared('
            CREATE TRIGGER `hapus_stok_masuk` BEFORE DELETE ON `barang_masuks` FOR EACH ROW BEGIN
                UPDATE barangs SET stok=stok-OLD.jumlah WHERE id=OLD.barang_id;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS `stok_masuk`;');
        DB::unprepared('DROP TRIGGER IF EXISTS `hapus_stok_masuk`;');
    }
};
