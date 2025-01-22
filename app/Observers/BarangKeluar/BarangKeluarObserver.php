<?php

namespace App\Observers\BarangKeluar;

use App\Models\BarangKeluar;

class BarangKeluarObserver
{
    /**
     * Handle the Barang "creating" event.
     */
    public function creating(BarangKeluar $barangKeluar): void
    {
        if (request()->has('tanggal')) {
            $barangKeluar->tanggal = date('Y-m-d', strtotime(request()->tanggal));
        }
    }}
