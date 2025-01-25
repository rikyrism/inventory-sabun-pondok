<?php

namespace App\Services\User;

use App\Models\User;

/**
 * Class UserService.
 */
class UserService
{
    public function index()
    {
        $barangs = User::orderBy('id_user')->get();
        return $barangs;
    }

    public function store($input)
    {
        $input['password'] = \Hash::make($input['password']);
        User::create($input);
        return true;
    }

    public function update($input, $data)
    {
        \Log::info('update user service: '. json_encode($input));
        $password = isset($input['password']) ? \Hash::make($input['password']) : $data->password;
        $data->nama_user = $input['nama_user'] ?? $data->nama_user;
        $data->username = $input['username'] ?? $data->username;
        $data->password = $password;
        $data->hak_akses = $input['hak_akses'] ?? $data->hak_akses;
        $data->save();
        return true;
    }

    public function destroy($data)
    {
        $data->delete();
        return true;
    }

}
