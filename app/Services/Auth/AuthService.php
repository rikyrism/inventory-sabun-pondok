<?php

namespace App\Services\Auth;

/**
 * Class AuthService.
 */
class AuthService
{
    public function updatePassword($request, $input)
    {
        $user = $request->user();
        if (isset($request['password'])) {
            $input['password'] = \Hash::make($input['password']);
        }

        $user->password = $input['password'] ?? $user->password;
        $user->save();
        return true;
    }

}
