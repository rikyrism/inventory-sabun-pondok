<?php

namespace App\Services\Produksi;

use App\Models\Produksi;

/**
 * Class ProduksiService.
 */
class ProduksiService
{
    public function index()
    {
        $barangs = Produksi::orderBy('id')->get();
        return $barangs;
    }

    public function getUniqueId()
    {
        $count = Produksi::count();
        $unique_id = "P" . str_pad($count+1, 4, "0", STR_PAD_LEFT);
        return $unique_id;
    }

    public function store($input)
    {
        Produksi::create($input);
        return true;
    }

    public function update($input, $data)
    {
        $data->nama_barang = $input['nama_barang'] ?? $data->nama_barang;
        $data->satuan = $input['satuan'] ?? $data->satuan;
        $data->tanggal = $input['tanggal'] ?? $data->tanggal;
        $data->jumlah = $input['jumlah'] ?? $data->jumlah;
        $data->status = $input['status'] ?? $data->status;
        $data->save();
        return true;
    }

    public function destroy($data)
    {
        $data->delete();
        return true;
    }
}
