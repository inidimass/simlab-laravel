<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\KelasPraktikum;
use App\Models\Laboratory;
use App\Models\Mahasiswa;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use App\Models\Praktikum;
use Illuminate\Support\Facades\Auth;

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
        $mahasiswa = Mahasiswa::where('user_id', Auth::id())->first();

        $profilLengkap = false;

        if ($mahasiswa) {
            $profilLengkap =
                $mahasiswa->nim !== null &&
                $mahasiswa->prodi !== '-' &&
                $mahasiswa->no_hp !== '-' &&
                $mahasiswa->alamat !== null;
        }

        return view('mahasiswa.dashboard', compact('profilLengkap'));
    }

    public function dosen()
    {
        return view('dosen.dashboard');
    }
}
