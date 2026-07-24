<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailPendaftaran;
use App\Models\Pendaftaran;
use App\Models\KelasPraktikum;
use Illuminate\Http\Request;

class DetailPendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailPendaftarans = DetailPendaftaran::with([
            'pendaftaran.mahasiswa',
            'kelasPraktikum',
        ])
            ->latest()
            ->get();

        return view('admin.detail_pendaftaran.index', compact('detailPendaftarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pendaftarans    = Pendaftaran::with('mahasiswa')->get();
        $kelasPraktikums = KelasPraktikum::with('praktikum.mataKuliah')->get();

        return view('admin.detail_pendaftaran.create', compact('pendaftarans', 'kelasPraktikums'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pendaftaran_id'     => 'required|exists:pendaftarans,id',
            'kelas_praktikum_id' => 'required|exists:kelas_praktikums,id',
            'harga'              => 'required|numeric|min:0',
        ]);

        DetailPendaftaran::create($validated);

        return redirect()
            ->route('detail_pendaftaran.index')
            ->with('success', 'Data detail pendaftaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailPendaftaran $detail_pendaftaran)
    {
        return view('admin.detail_pendaftaran.show', [
            'detailPendaftaran' => $detail_pendaftaran->load([
                'pendaftaran.mahasiswa',
                'kelasPraktikum.praktikum.mataKuliah',
            ])
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailPendaftaran $detail_pendaftaran)
    {
        $pendaftarans    = Pendaftaran::with('mahasiswa')->get();
        $kelasPraktikums = KelasPraktikum::with('praktikum.mataKuliah')->get();

        return view('admin.detail_pendaftaran.edit', [
            'detailPendaftaran' => $detail_pendaftaran,
            'pendaftarans'      => $pendaftarans,
            'kelasPraktikums'   => $kelasPraktikums,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailPendaftaran $detail_pendaftaran)
    {
        $validated = $request->validate([
            'pendaftaran_id'     => 'required|exists:pendaftarans,id',
            'kelas_praktikum_id' => 'required|exists:kelas_praktikums,id',
            'harga'              => 'required|numeric|min:0',
        ]);

        $detail_pendaftaran->update($validated);

        return redirect()
            ->route('detail_pendaftaran.index')
            ->with('success', 'Data detail pendaftaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailPendaftaran $detail_pendaftaran)
    {
        $detail_pendaftaran->delete();

        return redirect()
            ->route('detail_pendaftaran.index')
            ->with('success', 'Data detail pendaftaran berhasil dihapus.');
    }
}