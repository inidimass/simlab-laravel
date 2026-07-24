<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::firstOrCreate(
            ['user_id' => Auth::id()],
            [
                'nama' => Auth::user()->name,
                'nim' => '',
                'prodi' => '-',
                'angkatan' => now()->year,
                'no_hp' => '-',
                'alamat' => '',
            ]
        );

        return view('mahasiswa.profile', compact('mahasiswa'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'prodi' => 'required',
            'angkatan' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $mahasiswa = Mahasiswa::where('user_id', Auth::id())->first();

        $mahasiswa->update($request->only([
            'nama',
            'nim',
            'prodi',
            'angkatan',
            'no_hp',
            'alamat'
        ]));

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}
