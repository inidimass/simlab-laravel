<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Praktikum;
use App\Models\Laboratory;
use App\Models\Computer;
use App\Models\KelasPraktikum;
use App\Models\Jadwal;
use App\Models\Pendaftaran;
use App\Models\Pembayaran;

class DashboardController extends Controller
{
    public function admin()
{
    return view('admin.dashboard', [
        'mahasiswa' => Mahasiswa::count(),
        'dosen' => Dosen::count(),
        'praktikum' => Praktikum::count(),
        'laboratory' => Laboratory::count(),
        'computer' => Computer::count(),
        'kelas' => KelasPraktikum::count(),
        'jadwal' => Jadwal::count(),
        'pendaftaran' => Pendaftaran::count(),
        'pembayaran' => Pembayaran::count(),
    ]);
}

    public function mahasiswa()
    {
        return view('mahasiswa.dashboard');
    }

    public function dosen()
    {
        return view('dosen.dashboard');
    }
}
