<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::where('user_id', Auth::id())->first();

        if (!$mahasiswa) {
            return view('mahasiswa.jadwal', [
                'pendaftaran' => null,
                'pesan' => 'Lengkapi profil terlebih dahulu.'
            ]);
        }

        $pendaftaran = Pendaftaran::with([
            'detailPendaftarans.kelasPraktikum.praktikum.mataKuliah',
            'detailPendaftarans.kelasPraktikum.jadwals',
            'detailPendaftarans.kelasPraktikum.dosen',
            'detailPendaftarans.kelasPraktikum.laboratory',
        ])
        ->where('mahasiswa_id', $mahasiswa->id)
        ->first();

        if (!$pendaftaran) {
            return view('mahasiswa.jadwal', [
                'pendaftaran' => null,
                'pesan' => 'Anda belum mendaftar praktikum.'
            ]);
        }

        if ($pendaftaran->status != 'Diterima') {
            return view('mahasiswa.jadwal', [
                'pendaftaran' => null,
                'pesan' => 'Jadwal akan muncul setelah pembayaran diverifikasi admin.'
            ]);
        }

        return view('mahasiswa.jadwal', compact('pendaftaran'));
    }
}
