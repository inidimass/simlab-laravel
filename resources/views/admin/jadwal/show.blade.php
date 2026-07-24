@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Detail Jadwal
        </h1>
        <p class="text-gray-500 text-sm">
            Informasi lengkap data jadwal praktikum.
        </p>
    </div>

    <div class="space-y-4">

        <div>
            <span class="block text-gray-500 text-sm">Kelas Praktikum</span>
            <span class="text-gray-800 font-medium">{{ $jadwal->kelasPraktikum->nama_kelas ?? '-' }}</span>
        </div>

        <div>
            <span class="block text-gray-500 text-sm">Mata Kuliah</span>
            <span class="text-gray-800 font-medium">{{ $jadwal->kelasPraktikum->praktikum->mataKuliah->nama ?? '-' }}</span>
        </div>

        <div>
            <span class="block text-gray-500 text-sm">Dosen</span>
            <span class="text-gray-800 font-medium">{{ $jadwal->kelasPraktikum->dosen->nama ?? '-' }}</span>
        </div>

        <div>
            <span class="block text-gray-500 text-sm">Hari</span>
            <span class="text-gray-800 font-medium">{{ $jadwal->hari }}</span>
        </div>

        <div>
            <span class="block text-gray-500 text-sm">Jam</span>
            <span class="text-gray-800 font-medium">
                {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}
                -
                {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}
            </span>
        </div>

    </div>

    <div class="mt-6 flex gap-2">
        <a href="{{ route('jadwal.edit', $jadwal) }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded-lg">
            Edit
        </a>

        <a href="{{ route('jadwal.index') }}"
           class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
            Kembali
        </a>
    </div>

</div>

@endsection