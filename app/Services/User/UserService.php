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
        $barangs = User::orderBy('id')->get();
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
        $data->name = $input['name'] ?? $data->name;
        $data->email = $input['email'] ?? $data->email;
        $data->password = $password;
        $data->role = $input['role'] ?? $data->role;
        $data->save();
        return true;
    }

    public function destroy($data)
    {
        $data->delete();
        return true;
    }

}
