<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Mahasiswa\PembayaranController;
use App\Http\Controllers\Mahasiswa\PendaftaranController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Dashboard Berdasarkan Role
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
        ->name('admin.dashboard');
});

Route::middleware(['auth', 'role:dosen'])->group(function () {
    Route::get('/dosen/dashboard', [DashboardController::class, 'dosen'])
        ->name('dosen.dashboard');
});

Route::middleware(['auth', 'role:mahasiswa'])->group(function () {

    Route::get('/mahasiswa/dashboard', [DashboardController::class, 'mahasiswa'])
        ->name('mahasiswa.dashboard');

    Route::get('/mahasiswa/pendaftaran', [PendaftaranController::class, 'index'])
        ->name('mahasiswa.pendaftaran');

    Route::post('/mahasiswa/pendaftaran', [PendaftaranController::class, 'store'])
        ->name('mahasiswa.pendaftaran.store');

    Route::get('/mahasiswa/pembayaran',
        [PembayaranController::class, 'index'])
        ->name('mahasiswa.pembayaran');

    Route::post('/mahasiswa/pembayaran',
        [PembayaranController::class, 'store'])
        ->name('mahasiswa.pembayaran.store');
});

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
