<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\SystemController;
use App\Http\Controllers\Api\AuthController;

Route::prefix('v1')->group(function() {
    Route::get('healthcheck', [SystemController::class, 'healthcheck'])->name('api.healthcheck');

    /**
     * Auth Routes
     */
    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login'])->name('auth.login');

        Route::middleware('auth:sanctum')->group(function () {
            Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
        });
    });
});
