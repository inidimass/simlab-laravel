<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Praktikum;
use App\Models\Laboratory;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('admin.dashboard', [
            'mahasiswa' => Mahasiswa::count(),
            'dosen' => Dosen::count(),
            'praktikum' => Praktikum::count(),
            'laboratory' => Laboratory::count(),
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
