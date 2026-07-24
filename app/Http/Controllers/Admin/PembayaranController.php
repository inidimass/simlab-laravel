<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayarans = Pembayaran::with('pendaftaran.mahasiswa')
            ->latest()
            ->get();

        return view('admin.pembayaran.index', compact('pembayarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pendaftarans = Pendaftaran::with('mahasiswa')->get();

        return view('admin.pembayaran.create', compact('pendaftarans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pendaftaran_id'   => 'required|exists:pendaftarans,id',
            'total_bayar'      => 'required|numeric|min:0',
            'tanggal_bayar'    => 'required|date',
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'status'           => 'required|in:Menunggu,Diterima,Ditolak',
        ]);

        $validated['bukti_pembayaran'] = $request->file('bukti_pembayaran')
            ->store('bukti_pembayaran', 'public');

        Pembayaran::create($validated);

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Data pembayaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        return view('admin.pembayaran.show', [
            'pembayaran' => $pembayaran->load('pendaftaran.mahasiswa')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        $pendaftarans = Pendaftaran::with('mahasiswa')->get();

        return view('admin.pembayaran.edit', [
            'pembayaran'    => $pembayaran,
            'pendaftarans'  => $pendaftarans,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $validated = $request->validate([
            'pendaftaran_id'   => 'required|exists:pendaftarans,id',
            'total_bayar'      => 'required|numeric|min:0',
            'tanggal_bayar'    => 'required|date',
            'bukti_pembayaran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'status'           => 'required|in:Menunggu,Diterima,Ditolak',
        ]);

        if ($request->hasFile('bukti_pembayaran')) {

            if ($pembayaran->bukti_pembayaran) {
                Storage::disk('public')->delete($pembayaran->bukti_pembayaran);
            }

            $validated['bukti_pembayaran'] = $request->file('bukti_pembayaran')
                ->store('bukti_pembayaran', 'public');

        } else {
            unset($validated['bukti_pembayaran']);
        }

        $pembayaran->update($validated);

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Data pembayaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        if ($pembayaran->bukti_pembayaran) {
            Storage::disk('public')->delete($pembayaran->bukti_pembayaran);
        }

        $pembayaran->delete();

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Data pembayaran berhasil dihapus.');
    }
}