<?php

namespace App\Services\Kategori;

use App\Models\Kategori;

/**
 * Class KategoriService.
 */
class KategoriService
{
    public function index()
    {
        $data = Kategori::get();
        return $data;
    }

    public function getUniqueId()
    {
        $count = Kategori::count();
        $unique_id = "K" . str_pad($count+1, 4, "0", STR_PAD_LEFT);
        return $unique_id;
    }

    public function store($input)
    {
        Kategori::create($input);
        return true;
    }

    public function update($input, $data)
    {
        $data->nama_kategori = $input['nama_kategori'] ?? $data->nama_kategori;
        $data->save();
        return true;
    }

    public function destroy($data)
    {
        if ($data->barangs->count()> 0) {
            return false;
        } else {
            $data->delete();
            return true;
        }

    }

}
