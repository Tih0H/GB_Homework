<?php

namespace App\Services;

use App\Services\Contracts\Social;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User;

class SocialService implements Social
{

    public function loginAndGetRedirectUrl(User $socialUser): \Exception|string
    {
        $user = \App\Models\User::query()->where('email', '=', $socialUser->getEmail())->first();
        if ($user === null) {
            return route('register');
        }
        $user->name = $socialUser->getName();
        $user->avatar = $socialUser->getAvatar();
        if ($user->save()){
            Auth::loginUsingId($user->id);
            return route('account');
        }
        return new \Exception('Did not save user');
    }
}
