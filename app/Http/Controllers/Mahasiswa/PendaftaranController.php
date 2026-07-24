<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Praktikum;

class PendaftaranController extends Controller
{
    public function index()
    {
        $praktikums = Praktikum::with('mataKuliah')->get();

        return view('mahasiswa.pendaftaran.index', compact('praktikums'));
    }

    public function store()
    {

    }
}
