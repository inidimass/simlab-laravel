<?php

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

    // Frontend CRUD Admin
    Route::view('/admin/mahasiswa', 'admin.mahasiswa.index');
    Route::view('/admin/dosen', 'admin.dosen.index');
    Route::view('/admin/mata-kuliah', 'admin.mata_kuliah.index');
    Route::view('/admin/praktikum', 'admin.praktikum.index');
    Route::view('/admin/laboratorium', 'admin.laboratorium.index');
    Route::view('/admin/komputer', 'admin.komputer.index');
    Route::view('/admin/kelas-praktikum', 'admin.kelas_praktikum.index');
    Route::view('/admin/jadwal', 'admin.jadwal.index');
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