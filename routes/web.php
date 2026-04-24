<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\LoginCallback;
use App\Http\Controllers\Auth\Logout;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::middleware("guest")->group(function () {
    Route::get('/login', Login::class)->name("login");
    Route::get('/login/callback', LoginCallback::class)->name("login-callback");
});

Route::post("/logout", Logout::class)->middleware("auth");
