@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Detail Kelas Praktikum
        </h1>
        <p class="text-gray-500 text-sm">
            Informasi lengkap data kelas praktikum.
        </p>
    </div>

    <div class="space-y-4">

        <div>
            <span class="block text-gray-500 text-sm">Nama Kelas</span>
            <span class="text-gray-800 font-medium">{{ $kelasPraktikum->nama_kelas }}</span>
        </div>

        <div>
            <span class="block text-gray-500 text-sm">Praktikum</span>
            <span class="text-gray-800 font-medium">{{ $kelasPraktikum->praktikum->mataKuliah->nama ?? '-' }}</span>
        </div>

        <div>
            <span class="block text-gray-500 text-sm">Dosen</span>
            <span class="text-gray-800 font-medium">{{ $kelasPraktikum->dosen->nama ?? '-' }}</span>
        </div>

        <div>
            <span class="block text-gray-500 text-sm">Laboratorium</span>
            <span class="text-gray-800 font-medium">{{ $kelasPraktikum->laboratory->nama ?? '-' }}</span>
        </div>

        <div>
            <span class="block text-gray-500 text-sm">Kuota</span>
            <span class="text-gray-800 font-medium">
                {{ $kelasPraktikum->kuota_terisi }} / {{ $kelasPraktikum->kuota }}
            </span>
        </div>

    </div>

    <div class="mt-6 flex gap-2">
        <a href="{{ route('kelas_praktikum.edit', $kelasPraktikum) }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded-lg">
            Edit
        </a>

        <a href="{{ route('kelas_praktikum.index') }}"
           class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
            Kembali
        </a>
    </div>

</div>

@endsection