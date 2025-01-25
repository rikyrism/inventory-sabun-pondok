<?php

namespace App\Services\BarangKeluar;

use App\Models\BarangKeluar;

/**
 * Class BarangKeluarService.
 */
class BarangKeluarService
{
    public function index()
    {
        $barangs = BarangKeluar::orderBy('id_keluar')->get();
        return $barangs;
    }

    public function getUniqueId()
    {
        $count = BarangKeluar::count();
        $unique_id = "TK" . str_pad($count+1, 3, "0", STR_PAD_LEFT);
        return $unique_id;
    }

    public function store($input)
    {
        BarangKeluar::create($input);
        return true;
    }

    public function destroy($data)
    {
        $data->delete();
        return true;
    }

}
