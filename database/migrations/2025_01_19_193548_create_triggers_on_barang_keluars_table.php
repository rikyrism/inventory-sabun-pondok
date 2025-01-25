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
            CREATE TRIGGER `stok_keluar` AFTER INSERT ON `tbl_barang_keluar` FOR EACH ROW BEGIN
                UPDATE tbl_barang SET stok=stok-NEW.jumlah WHERE id_barang=NEW.barang;
            END;
        ');
        DB::unprepared('
            CREATE TRIGGER `hapus_stok_keluar` BEFORE DELETE ON `tbl_barang_keluar` FOR EACH ROW BEGIN
                UPDATE tbl_barang SET stok=stok+OLD.jumlah WHERE id_barang=OLD.barang;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS `stok_keluar`;');
        DB::unprepared('DROP TRIGGER IF EXISTS `hapus_stok_keluar`;');
    }
};
