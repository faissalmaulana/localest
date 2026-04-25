<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\LoginCallback;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CityController::class, "index"]);

Route::middleware("guest")->group(function () {
    Route::get('/login', Login::class)->name("login");
    Route::get('/login/callback', LoginCallback::class)->name("login-callback");
});

Route::middleware("auth")->group(function () {
    Route::post("/cities", [CityController::class, "store"]);
    Route::get("/add-new-city", [CityController::class, "create"]);
});

Route::post("/logout", Logout::class)->middleware("auth");
