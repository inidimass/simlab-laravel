@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Detail Pendaftaran
        </h1>
        <p class="text-gray-500 text-sm">
            Informasi lengkap data pendaftaran.
        </p>
    </div>

    <div class="space-y-4">

        <div>
            <span class="block text-gray-500 text-sm">Mahasiswa</span>
            <span class="text-gray-800 font-medium">{{ $pendaftaran->mahasiswa->nama ?? '-' }}</span>
        </div>

        <div>
            <span class="block text-gray-500 text-sm">Tanggal Daftar</span>
            <span class="text-gray-800 font-medium">
                {{ \Carbon\Carbon::parse($pendaftaran->tanggal_daftar)->format('d-m-Y') }}
            </span>
        </div>

        <div>
            <span class="block text-gray-500 text-sm">Status</span>
            <span class="text-gray-800 font-medium">
                @if($pendaftaran->status === 'Lunas')
                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">Lunas</span>
                @elseif($pendaftaran->status === 'Menunggu Verifikasi')
                    <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-sm">Menunggu Verifikasi</span>
                @else
                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-sm">Belum Bayar</span>
                @endif
            </span>
        </div>

    </div>

    <div class="mt-6 flex gap-2">
        <a href="{{ route('pendaftaran.edit', $pendaftaran) }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded-lg">
            Edit
        </a>

        <a href="{{ route('pendaftaran.index') }}"
           class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
            Kembali
        </a>
    </div>

</div>

@endsection