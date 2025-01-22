<?php

namespace App\Observers\BarangMasuk;

use App\Models\BarangMasuk;

class BarangMasukObserver
{
    /**
     * Handle the Barang "creating" event.
     */
    public function creating(BarangMasuk $barangMasuk): void
    {
        if (request()->has('tanggal')) {
            $barangMasuk->tanggal = date('Y-m-d', strtotime(request()->tanggal));
        }
    }
}
