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
            CREATE TRIGGER `update_stok_after_insert` AFTER INSERT ON `produksis` FOR EACH ROW BEGIN
                UPDATE barangs SET stok = stok + NEW.jumlah WHERE id=NEW.barang_id;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS `update_stok_after_insert`;');
    }
};
