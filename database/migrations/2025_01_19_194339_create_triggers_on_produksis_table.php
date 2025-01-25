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
            CREATE TRIGGER `update_stok_after_insert` AFTER INSERT ON `tbl_produksi` FOR EACH ROW BEGIN
                UPDATE tbl_barang SET stok = stok + NEW.jumlah WHERE id_barang=NEW.id_barang;
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
