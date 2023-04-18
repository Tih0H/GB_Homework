<?php

namespace App\Http\Controllers;

use App\Services\Contracts\Social;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Laravel\Socialite\Facades\Socialite;

class SocialProvidersController extends Controller
{
    public function redirect(string $driver): \Symfony\Component\HttpFoundation\RedirectResponse|RedirectResponse
    {
        return Socialite::driver($driver)->redirect();
    }

    /**
     * @param string $driver
     * @param Social $social
     * @return Application|RedirectResponse|Redirector
     */
    public function callback(string $driver, Social $social): Application|RedirectResponse|Redirector
    {
        return redirect($social->loginAndGetRedirectUrl(Socialite::driver($driver)->user()));
    }
}
