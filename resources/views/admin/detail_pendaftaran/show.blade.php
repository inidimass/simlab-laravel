@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Detail Pendaftaran
        </h1>
        <p class="text-gray-500 text-sm">
            Informasi lengkap data detail pendaftaran.
        </p>
    </div>

    <div class="space-y-4">

        <div>
            <span class="block text-gray-500 text-sm">Mahasiswa</span>
            <span class="text-gray-800 font-medium">{{ $detailPendaftaran->pendaftaran->mahasiswa->nama ?? '-' }}</span>
        </div>

        <div>
            <span class="block text-gray-500 text-sm">Tanggal Daftar</span>
            <span class="text-gray-800 font-medium">
                {{ \Carbon\Carbon::parse($detailPendaftaran->pendaftaran->tanggal_daftar)->format('d-m-Y') }}
            </span>
        </div>

        <div>
            <span class="block text-gray-500 text-sm">Kelas Praktikum</span>
            <span class="text-gray-800 font-medium">{{ $detailPendaftaran->kelasPraktikum->nama_kelas ?? '-' }}</span>
        </div>

        <div>
            <span class="block text-gray-500 text-sm">Mata Kuliah</span>
            <span class="text-gray-800 font-medium">{{ $detailPendaftaran->kelasPraktikum->praktikum->mataKuliah->nama ?? '-' }}</span>
        </div>

        <div>
            <span class="block text-gray-500 text-sm">Harga</span>
            <span class="text-gray-800 font-medium">
                Rp{{ number_format($detailPendaftaran->harga, 0, ',', '.') }}
            </span>
        </div>

    </div>

    <div class="mt-6 flex gap-2">
        <a href="{{ route('detail_pendaftaran.edit', $detailPendaftaran) }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded-lg">
            Edit
        </a>

        <a href="{{ route('detail_pendaftaran.index') }}"
           class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
            Kembali
        </a>
    </div>

</div>

@endsection