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

    public function store($input)
    {
        Kategori::create($input);
        return true;
    }

    public function update($input, $data)
    {
        $data->name = $input['name'] ?? $data->name;
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
