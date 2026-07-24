<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::where('user_id', Auth::id())->first();

        $pendaftaran = Pendaftaran::with([
            'detailPendaftarans',
            'pembayaran',
        ])->where('mahasiswa_id', $mahasiswa->id)
            ->first();

        return view('mahasiswa.pembayaran.index', compact('pendaftaran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|max:2048',
        ]);

        $mahasiswa = Mahasiswa::where('user_id', Auth::id())->first();

        $pendaftaran = Pendaftaran::with('detailPendaftarans')
            ->where('mahasiswa_id', $mahasiswa->id)
            ->first();

        if (! $pendaftaran) {
            return back()->with('error', 'Belum melakukan pendaftaran.');
        }

        $pembayaran = Pembayaran::where('pendaftaran_id', $pendaftaran->id)->first();

        if ($pembayaran) {

            if ($pembayaran->status == 'Menunggu' || $pembayaran->status == 'Diterima') {
                return back()->with('error', 'Pembayaran sudah diupload.');
            }

            // Kalau status Ditolak, upload ulang
            $path = $request->file('bukti_pembayaran')->store('pembayaran', 'public');

            $pembayaran->update([
                'bukti_pembayaran' => $path,
                'tanggal_bayar' => now(),
                'status' => 'Menunggu',     
            ]);

            $pendaftaran->update([
                'status' => 'Menunggu Verifikasi',
            ]);

            return back()->with('success', 'Upload ulang berhasil.');
        }

        $path = $request->file('bukti_pembayaran')->store('pembayaran', 'public');

        Pembayaran::create([
            'pendaftaran_id' => $pendaftaran->id,
            'total_bayar' => $pendaftaran->detailPendaftarans->sum('harga'),
            'bukti_pembayaran' => $path,
            'tanggal_bayar' => now(),
            'status' => 'Menunggu',
        ]);

        $pendaftaran->update([
            'status' => 'Menunggu Verifikasi',
        ]);

        return back()->with('success', 'Bukti pembayaran berhasil diupload.');
    }
}
