<?php

use App\Http\Controllers\Api\{AuthController, DashboardController, PesertaController, SkemaController};
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::name('api.')->group(function () {
        Route::apiResource('skema', SkemaController::class);
        Route::apiResource('peserta', PesertaController::class);
    });
});