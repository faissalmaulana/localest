<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Login extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        /** @disregard */
        // scopes() method exists but intelephense somehow can't find it.
        // set no scope (public-only data)
        return Socialite::driver("github")->setScopes([])->redirect();
    }
}
