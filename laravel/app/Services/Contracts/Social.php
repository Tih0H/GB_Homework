<?php

namespace App\Services\Contracts;

use Laravel\Socialite\Contracts\User;

interface Social
{
    public function loginAndGetRedirectUrl(User $socialUser):\Exception|string;
}
