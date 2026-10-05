<?php

use App\Http\Controllers\Web\{AuthController, DashboardController, SkemaController, PesertaController};
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('skema', SkemaController::class)->except('show');
    Route::resource('peserta', PesertaController::class)
        ->parameters(['peserta' => 'peserta']);
});