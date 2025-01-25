<?php

namespace App\Services\Laporan;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

/**
 * Class LaporanService.
 */
class LaporanService
{
    public function getDataBarang()
    {
        $barangs = Barang::orderBy('id_barang')->get();
        return $barangs;
    }

    public function getDataBarangMasukFilter($request)
    {
        $start_date = $request->tanggal_awal;
        $end_date = $request->tanggal_akhir;
        $data = new BarangMasuk;

        if (isset($start_date) and isset($end_date)) {
            $start_date = date('Y-m-d', strtotime($start_date));
            $end_date = date('Y-m-d', strtotime($end_date));

            $barang_masuks = $data->whereDate('tanggal', '>=', $start_date)->whereDate('tanggal', '<=', $end_date)->get();
            return $barang_masuks;
        } else {
            return collect([]);
        }
    }

    public function getDataBarangMasuk($start_date, $end_date)
    {
        $data = new BarangMasuk;

        if (isset($start_date) and isset($end_date)) {
            $barang_masuks = $data->whereDate('tanggal', '>=', $start_date)->whereDate('tanggal', '<=', $end_date)->orderBy('id_masuk')->get();
            return $barang_masuks;
        } else {
            return collect([]);
        }
    }


    public function getDataBarangKeluarFilter($request)
    {
        $start_date = $request->tanggal_awal;
        $end_date = $request->tanggal_akhir;
        $data = new BarangKeluar;

        if (isset($start_date) and isset($end_date)) {
            $start_date = date('Y-m-d', strtotime($start_date));
            $end_date = date('Y-m-d', strtotime($end_date));

            $barang_keluars = $data->whereDate('tanggal', '>=', $start_date)->whereDate('tanggal', '<=', $end_date)->get();
            return $barang_keluars;
        } else {
            return collect([]);
        }
    }

    public function getDataBarangKeluar($start_date, $end_date)
    {
        $data = new BarangKeluar;

        if (isset($start_date) and isset($end_date)) {
            $barang_keluars = $data->whereDate('tanggal', '>=', $start_date)->whereDate('tanggal', '<=', $end_date)->orderBy('id_keluar')->get();
            return $barang_keluars;
        } else {
            return collect([]);
        }
    }

}
