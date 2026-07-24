<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\KelasPraktikum;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwals = Jadwal::with(['kelasPraktikum.praktikum.mataKuliah', 'kelasPraktikum.dosen'])
            ->latest()
            ->get();

        return view('admin.jadwal.index', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelasPraktikums = KelasPraktikum::with('praktikum.mataKuliah')->get();

        return view('admin.jadwal.create', compact('kelasPraktikums'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kelas_praktikum_id' => 'required|exists:kelas_praktikums,id',
            'hari'               => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'jam_mulai'          => 'required|date_format:H:i',
            'jam_selesai'        => 'required|date_format:H:i|after:jam_mulai',
        ]);

        Jadwal::create($validated);

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Data jadwal berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        return view('admin.jadwal.show', [
            'jadwal' => $jadwal->load(['kelasPraktikum.praktikum.mataKuliah', 'kelasPraktikum.dosen'])
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        $kelasPraktikums = KelasPraktikum::with('praktikum.mataKuliah')->get();

        return view('admin.jadwal.edit', [
            'jadwal'          => $jadwal,
            'kelasPraktikums' => $kelasPraktikums,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $validated = $request->validate([
            'kelas_praktikum_id' => 'required|exists:kelas_praktikums,id',
            'hari'               => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'jam_mulai'          => 'required|date_format:H:i',
            'jam_selesai'        => 'required|date_format:H:i|after:jam_mulai',
        ]);

        $jadwal->update($validated);

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Data jadwal berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Data jadwal berhasil dihapus.');
    }
}