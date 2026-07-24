<?php

use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\MataKuliahController;
use App\Http\Controllers\Admin\PraktikumController;
use App\Http\Controllers\Admin\LaboratoryController;
use App\Http\Controllers\Admin\ComputerController;
use App\Http\Controllers\Admin\KelasPraktikumController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\PendaftaranController;
use App\Http\Controllers\Admin\DetailPendaftaranController;
use App\Http\Controllers\Admin\PembayaranController;

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

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('admin/mahasiswa', MahasiswaController::class);

    Route::resource('/admin/dosen', DosenController::class);

    Route::resource('admin/mata-kuliah', MataKuliahController::class);

    Route::resource('admin/praktikum', PraktikumController::class)
    ->names('praktikum');

    Route::resource('admin/laboratorium', LaboratoryController::class);

    Route::resource('admin/komputer', ComputerController::class)
    ->names('komputer');

    Route::resource('admin/kelas-praktikum', KelasPraktikumController::class)
    ->names('kelas_praktikum');

    Route::resource('admin/jadwal', JadwalController::class)
    ->names('jadwal');

    Route::resource('admin/pendaftaran', PendaftaranController::class)
    ->names('pendaftaran');

    Route::resource('admin/detail-pendaftaran', DetailPendaftaranController::class)
    ->names('detail_pendaftaran');

    Route::resource('admin/pembayaran', PembayaranController::class)
    ->names('pembayaran');

});

Route::middleware(['auth', 'role:dosen'])->group(function () {

    Route::get('/dosen/dashboard', function () {
        return view('dosen.dashboard');
    })->name('dosen.dashboard');

});

Route::middleware(['auth', 'role:mahasiswa'])->group(function () {

    Route::get('/mahasiswa/dashboard', function () {
        return view('mahasiswa.dashboard');
    })->name('mahasiswa.dashboard');

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