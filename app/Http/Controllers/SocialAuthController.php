<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback(Request $request)
    {
        dd(Socialite::driver('facebook')->user());
    }
}
