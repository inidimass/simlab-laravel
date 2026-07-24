<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Praktikum;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class PraktikumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $praktikums = Praktikum::with('mataKuliah')
            ->latest()
            ->get();

        return view('admin.praktikum.index', compact('praktikums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mataKuliahs = MataKuliah::orderBy('nama')->get();

        return view('admin.praktikum.create', compact('mataKuliahs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'biaya'          => 'required|numeric|min:0',
            'status'         => 'required|boolean',
        ]);

        Praktikum::create($validated);

        return redirect()
            ->route('praktikum.index')
            ->with('success', 'Data praktikum berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Praktikum $praktikum)
    {
        $praktikum->load('mataKuliah');

        return view('admin.praktikum.show', compact('praktikum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Praktikum $praktikum)
    {
        $mataKuliahs = MataKuliah::orderBy('nama')->get();

        return view('admin.praktikum.edit', compact('praktikum', 'mataKuliahs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Praktikum $praktikum)
    {
        $validated = $request->validate([
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'biaya'          => 'required|numeric|min:0',
            'status'         => 'required|boolean',
        ]);

        $praktikum->update($validated);

        return redirect()
            ->route('praktikum.index')
            ->with('success', 'Data praktikum berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Praktikum $praktikum)
    {
        $praktikum->delete();

        return redirect()
            ->route('praktikum.index')
            ->with('success', 'Data praktikum berhasil dihapus.');
    }
}