<?php

namespace App\Services\BarangMasuk;

use App\Models\BarangMasuk;

/**
 * Class BarangMasukService.
 */
class BarangMasukService
{
    public function index()
    {
        $barangs = BarangMasuk::orderBy('id')->get();
        return $barangs;
    }

    public function getUniqueId()
    {
        $count = BarangMasuk::count();
        $unique_id = "TM" . str_pad($count+1, 4, "0", STR_PAD_LEFT);
        return $unique_id;
    }

    public function store($input)
    {
        BarangMasuk::create($input);
        return true;
    }

    public function destroy($data)
    {
        $data->delete();
        return true;
    }

}
