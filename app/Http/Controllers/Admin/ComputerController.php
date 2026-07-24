<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use App\Models\Laboratory;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $computers = Computer::with('laboratory')->latest()->get();

        return view('admin.komputer.index', compact('computers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $laboratories = Laboratory::all();

        return view('admin.komputer.create', compact('laboratories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'laboratory_id' => 'required|exists:laboratories,id',
            'kode_pc'       => 'required|max:50|unique:computers,kode_pc',
            'spesifikasi'   => 'nullable',
            'status'        => 'required|in:aktif,rusak,maintenance',
        ]);

        Computer::create($validated);

        return redirect()
            ->route('komputer.index')
            ->with('success', 'Data komputer berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Computer $komputer)
    {
        return view('admin.komputer.show', [
            'computer' => $komputer->load('laboratory')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Computer $komputer)
    {
        $laboratories = Laboratory::all();

        return view('admin.komputer.edit', [
            'computer' => $komputer,
            'laboratories' => $laboratories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Computer $komputer)
    {
        $validated = $request->validate([
            'laboratory_id' => 'required|exists:laboratories,id',
            'kode_pc'       => 'required|max:50|unique:computers,kode_pc,' . $komputer->id,
            'spesifikasi'   => 'nullable',
            'status'        => 'required|in:aktif,rusak,maintenance',
        ]);

        $komputer->update($validated);

        return redirect()
            ->route('komputer.index')
            ->with('success', 'Data komputer berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Computer $komputer)
    {
        $komputer->delete();

        return redirect()
            ->route('komputer.index')
            ->with('success', 'Data komputer berhasil dihapus.');
    }
}