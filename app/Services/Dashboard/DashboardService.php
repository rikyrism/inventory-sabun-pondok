<?php

namespace App\Services\Dashboard;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

/**
 * Class DashboardService.
 */
class DashboardService
{
    public function getCountData()
    {
        $barang = Barang::count();
        $barangMasuk = BarangMasuk::count();
        $barangKeluar = BarangKeluar::count();

        return [
            'barang' => $barang,
            'barangMasuk' => $barangMasuk,
            'barangKeluar' => $barangKeluar,
        ];
    }

    public function getDataBarang()
    {
        $barangs = Barang::where('stok', '<=', 'stok_minimum')
            ->orderBy('id_barang', 'asc')
            ->get();
        return $barangs;
    }
}
