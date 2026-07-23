<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::view('/dashboard', 'admin.dashboard');
    Route::view('/mahasiswa', 'admin.mahasiswa.index');
    Route::view('/dosen', 'admin.dosen.index');
    Route::view('/mata-kuliah', 'admin.mata_kuliah.index');
    Route::view('/praktikum', 'admin.praktikum.index');
    Route::view('/laboratorium', 'admin.laboratorium.index');
    Route::view('/komputer', 'admin.komputer.index');
    Route::view('/kelas-praktikum', 'admin.kelas_praktikum.index');
    Route::view('/jadwal', 'admin.jadwal.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
