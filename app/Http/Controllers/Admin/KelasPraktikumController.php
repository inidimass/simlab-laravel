<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KelasPraktikum;
use App\Models\Praktikum;
use App\Models\Dosen;
use App\Models\Laboratory;
use Illuminate\Http\Request;

class KelasPraktikumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelasPraktikums = KelasPraktikum::with(['praktikum', 'dosen', 'laboratory'])
            ->latest()
            ->get();

        return view('admin.kelas_praktikum.index', compact('kelasPraktikums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $praktikums   = Praktikum::all();
        $dosens       = Dosen::all();
        $laboratories = Laboratory::all();

        return view('admin.kelas_praktikum.create', compact('praktikums', 'dosens', 'laboratories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'praktikum_id'   => 'required|exists:praktikums,id',
            'dosen_id'       => 'required|exists:dosens,id',
            'laboratory_id'  => 'required|exists:laboratories,id',
            'nama_kelas'     => 'required|max:100',
            'kuota'          => 'required|integer|min:1',
        ]);

        KelasPraktikum::create($validated);

        return redirect()
            ->route('kelas_praktikum.index')
            ->with('success', 'Data kelas praktikum berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KelasPraktikum $kelas_praktikum)
    {
        return view('admin.kelas_praktikum.show', [
            'kelasPraktikum' => $kelas_praktikum->load(['praktikum', 'dosen', 'laboratory'])
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KelasPraktikum $kelas_praktikum)
    {
        $praktikums   = Praktikum::all();
        $dosens       = Dosen::all();
        $laboratories = Laboratory::all();

        return view('admin.kelas_praktikum.edit', [
            'kelasPraktikum' => $kelas_praktikum,
            'praktikums'     => $praktikums,
            'dosens'         => $dosens,
            'laboratories'   => $laboratories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KelasPraktikum $kelas_praktikum)
    {
        $validated = $request->validate([
            'praktikum_id'   => 'required|exists:praktikums,id',
            'dosen_id'       => 'required|exists:dosens,id',
            'laboratory_id'  => 'required|exists:laboratories,id',
            'nama_kelas'     => 'required|max:100',
            'kuota'          => 'required|integer|min:1',
            'kuota_terisi'   => 'required|integer|min:0',
        ]);

        $kelas_praktikum->update($validated);

        return redirect()
            ->route('kelas_praktikum.index')
            ->with('success', 'Data kelas praktikum berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KelasPraktikum $kelas_praktikum)
    {
        $kelas_praktikum->delete();

        return redirect()
            ->route('kelas_praktikum.index')
            ->with('success', 'Data kelas praktikum berhasil dihapus.');
    }
}