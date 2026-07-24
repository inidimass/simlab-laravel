<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mataKuliahs = MataKuliah::latest()->get();

        return view('admin.mata_kuliah.index', compact('mataKuliahs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mata_kuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode'      => 'required|max:20|unique:mata_kuliahs,kode',
            'nama'      => 'required|max:100',
            'semester'  => 'required|integer|min:1|max:14',
            'sks'       => 'required|integer|min:1|max:6',
        ]);

        MataKuliah::create($validated);

        return redirect()
            ->route('mata-kuliah.index')
            ->with('success', 'Data mata kuliah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MataKuliah $mataKuliah)
    {
        return view('admin.mata_kuliah.show', compact('mataKuliah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataKuliah $mataKuliah)
    {
        return view('admin.mata_kuliah.edit', compact('mataKuliah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MataKuliah $mataKuliah)
    {
        $validated = $request->validate([
            'kode'      => 'required|max:20|unique:mata_kuliahs,kode,' . $mataKuliah->id,
            'nama'      => 'required|max:100',
            'semester'  => 'required|integer|min:1|max:14',
            'sks'       => 'required|integer|min:1|max:6',
        ]);

        $mataKuliah->update($validated);

        return redirect()
            ->route('mata-kuliah.index')
            ->with('success', 'Data mata kuliah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataKuliah $mataKuliah)
    {
        $mataKuliah->delete();

        return redirect()
            ->route('mata-kuliah.index')
            ->with('success', 'Data mata kuliah berhasil dihapus.');
    }
}