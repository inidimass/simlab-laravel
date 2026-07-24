<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Laboratory;
use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laboratories = Laboratory::latest()->get();

        return view('admin.laboratorium.index', compact('laboratories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.laboratorium.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'       => 'required|max:100',
            'lokasi'     => 'required|max:100',
            'kapasitas'  => 'required|integer|min:1',
        ]);

        Laboratory::create($validated);

        return redirect()
            ->route('laboratorium.index')
            ->with('success', 'Data laboratorium berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laboratory $laboratorium)
    {
        return view('admin.laboratorium.show', [
            'laboratory' => $laboratorium
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laboratory $laboratorium)
    {
        return view('admin.laboratorium.edit', [
            'laboratory' => $laboratorium
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laboratory $laboratorium)
    {
        $validated = $request->validate([
            'nama'       => 'required|max:100',
            'lokasi'     => 'required|max:100',
            'kapasitas'  => 'required|integer|min:1',
        ]);

        $laboratorium->update($validated);

        return redirect()
            ->route('laboratorium.index')
            ->with('success', 'Data laboratorium berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laboratory $laboratorium)
    {
        $laboratorium->delete();

        return redirect()
            ->route('laboratorium.index')
            ->with('success', 'Data laboratorium berhasil dihapus.');
    }
}