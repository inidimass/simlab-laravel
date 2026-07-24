<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\DetailPendaftaran;
use App\Models\KelasPraktikum;
use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function index()
    {
        $kelas = KelasPraktikum::with('praktikum.mataKuliah')->get();

        return view('mahasiswa.pendaftaran.index', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas_praktikum_id' => 'required|exists:kelas_praktikums,id',
        ]);

        $mahasiswa = Mahasiswa::where('user_id', Auth::id())->first();
        $cek = Pendaftaran::where('mahasiswa_id', $mahasiswa->id)->exists();

        if ($cek) {
            return back()->with('error', 'Anda sudah terdaftar pada praktikum.');
        }

        $kelas = KelasPraktikum::with('praktikum')->findOrFail(
            $request->kelas_praktikum_id
        );

        if ($kelas->kuota_terisi >= $kelas->kuota) {
            return back()->with('error', 'Kuota kelas sudah penuh.');
        }

        $pendaftaran = Pendaftaran::create([
            'mahasiswa_id' => $mahasiswa->id,
            'tanggal_daftar' => now(),
            'status' => 'Belum Bayar',
        ]);

        DetailPendaftaran::create([
            'pendaftaran_id' => $pendaftaran->id,
            'kelas_praktikum_id' => $kelas->id,
            'harga' => $kelas->praktikum->biaya,
        ]);

        $kelas->increment('kuota_terisi');

        return redirect()
            ->route('mahasiswa.pendaftaran')
            ->with('success', 'Pendaftaran berhasil.');
    }
}
