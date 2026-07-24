<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendaftarans = Pendaftaran::with('mahasiswa')
            ->latest()
            ->get();

        return view('admin.pendaftaran.index', compact('pendaftarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mahasiswas = Mahasiswa::all();

        return view('admin.pendaftaran.create', compact('mahasiswas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'mahasiswa_id'   => 'required|exists:mahasiswas,id',
            'tanggal_daftar' => 'required|date',
            'status'         => 'required|in:Belum Bayar,Menunggu Verifikasi,Lunas',
        ]);

        Pendaftaran::create($validated);

        return redirect()
            ->route('pendaftaran.index')
            ->with('success', 'Data pendaftaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pendaftaran $pendaftaran)
    {
        return view('admin.pendaftaran.show', [
            'pendaftaran' => $pendaftaran->load('mahasiswa')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        $mahasiswas = Mahasiswa::all();

        return view('admin.pendaftaran.edit', [
            'pendaftaran' => $pendaftaran,
            'mahasiswas'  => $mahasiswas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        $validated = $request->validate([
            'mahasiswa_id'   => 'required|exists:mahasiswas,id',
            'tanggal_daftar' => 'required|date',
            'status'         => 'required|in:Belum Bayar,Menunggu Verifikasi,Lunas',
        ]);

        $pendaftaran->update($validated);

        return redirect()
            ->route('pendaftaran.index')
            ->with('success', 'Data pendaftaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();

        return redirect()
            ->route('pendaftaran.index')
            ->with('success', 'Data pendaftaran berhasil dihapus.');
    }
}