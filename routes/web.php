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
    Route::prefix("cities")->group(function () {
        Route::post("/", [CityController::class, "store"]);
        Route::get("/new", [CityController::class, "create"]);
        Route::get("/{city}", [CityController::class, "show"]);
        Route::get("/{city}/edit", [CityController::class, "edit"]);
        Route::put("/{city}", [CityController::class, "update"]);
        Route::delete("/{city}", [CityController::class, "destroy"]);
    });
});

Route::post("/logout", Logout::class)->middleware("auth");
