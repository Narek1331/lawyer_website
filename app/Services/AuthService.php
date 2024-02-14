<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * Attempt to authenticate the user.
     *
     * @param array $credentials
     * @return string|false
     */
    public function signin(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $this->createPersonalAccessToken($user);
            return $token;
        }

        return false;
    }

    /**
     * Create a personal access token for the user.
     *
     * @param User $user
     * @return string
     */
    public function createPersonalAccessToken(User $user)
    {
        $clientName = env('APP_NAME', 'MyApp');
        return $user->createToken($clientName)->accessToken;
    }
}
