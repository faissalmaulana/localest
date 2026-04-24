<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Socialite;

class LoginCallback extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try {
            /** @disregard */
            // scopes() method exists but intelephense somehow can't find it.
            $githubUser = Socialite::driver("github")->scopes([])->user();

            $user = User::updateOrCreate(
                ["github_id" => $githubUser->getId()],
                [
                    "name" => $githubUser->getNickname() ?? $githubUser->getName(),
                    "avatar_url" => $githubUser->getAvatar(),
                ]
            );

            Auth::login($user);

            return redirect()->intended("/")
                ->with("success", "Welcome to Localest!");
        } catch (\Throwable $e) {
            report($e);

            return back()->withErrors([
                "error" => "Something went wrong",
            ]);
        }
    }
}
