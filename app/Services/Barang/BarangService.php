<?php

namespace App\Services\Barang;

use App\Models\Barang;
use App\Models\Kategori;

/**
 * Class BarangService.
 */
class BarangService
{
    public function index()
    {
        $barangs = Barang::orderBy('id_barang')->with('kategori')->get();
        return $barangs;
    }

    public function kategoris()
    {
        $data = Kategori::all();
        return $data;
    }

    public function getUniqueId()
    {
        $count = Barang::count();
        $unique_id = "B" . str_pad($count+1, 4, "0", STR_PAD_LEFT);
        return $unique_id;
    }

    public function store($input)
    {
        Barang::create($input);
        return true;
    }

    public function update($input, $data)
    {
        $data->id_kategori = $input['id_kategori'] ?? $data->id_kategori;
        $data->nama_barang = $input['nama_barang'] ?? $data->nama_barang;
        $data->stok_minimum = $input['stok_minimum'] ?? $data->stok_minimum;
        $data->satuan = $input['satuan'] ?? $data->satuan;
        $data->save();
        return true;
    }

    public function destroy($data)
    {
        $barang_masuk = $data->barang_masuks->count();
        if ($barang_masuk > 0) {
            return false;
        } else {
            $data->delete();
            return true;
        }

    }

}
