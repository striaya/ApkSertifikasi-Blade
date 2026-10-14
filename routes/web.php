<?php

use App\Http\Controllers\Web\AkunController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\PesertaController;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\RiwayatPendaftaranController;
use App\Http\Controllers\Web\SkemaController;
use App\Http\Controllers\Web\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.process');

});

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::middleware('role:admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('skema', SkemaController::class)
            ->except('show');

        Route::patch('/peserta/{peserta}/status', [
            PesertaController::class,
            'updateStatus',
        ])->name('peserta.status');

        Route::resource('peserta', PesertaController::class)
            ->parameters([
                'peserta' => 'peserta',
            ]);

        Route::resource('akun', AkunController::class)
            ->except('show');

    });

    Route::middleware('role:user')->group(function () {

        Route::get('/user/dashboard', [UserDashboardController::class, 'index'])
            ->name('user.dashboard');

        Route::get('/user/profile', [ProfileController::class, 'show'])
            ->name('user.profile');

        Route::get('/user/profile/edit', [ProfileController::class, 'edit'])
            ->name('user.profile.edit');

        Route::put('/user/profile', [ProfileController::class, 'update'])
            ->name('user.profile.update');

        Route::get('/user/profile/password', [ProfileController::class, 'editPassword'])
            ->name('user.profile.password');

        Route::put('/user/profile/password', [ProfileController::class, 'updatePassword'])
            ->name('user.profile.password.update');

        Route::get('/user/riwayat', [RiwayatPendaftaranController::class, 'index'])
            ->name('user.riwayat');

    });

});
