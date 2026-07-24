@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Detail Komputer
        </h1>
        <p class="text-gray-500 text-sm">
            Informasi lengkap data komputer.
        </p>
    </div>

    <div class="space-y-4">

        <div>
            <span class="block text-gray-500 text-sm">Kode PC</span>
            <span class="text-gray-800 font-medium">{{ $computer->kode_pc }}</span>
        </div>

        <div>
            <span class="block text-gray-500 text-sm">Laboratorium</span>
            <span class="text-gray-800 font-medium">{{ $computer->laboratory->nama ?? '-' }}</span>
        </div>

        <div>
            <span class="block text-gray-500 text-sm">Spesifikasi</span>
            <span class="text-gray-800 font-medium">{{ $computer->spesifikasi ?? '-' }}</span>
        </div>

        <div>
            <span class="block text-gray-500 text-sm">Status</span>
            <span class="text-gray-800 font-medium">
                @if($computer->status === 'aktif')
                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">Aktif</span>
                @elseif($computer->status === 'rusak')
                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-sm">Rusak</span>
                @else
                    <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-sm">Maintenance</span>
                @endif
            </span>
        </div>

    </div>

    <div class="mt-6 flex gap-2">
        <a href="{{ route('komputer.edit', $computer) }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded-lg">
            Edit
        </a>

        <a href="{{ route('komputer.index') }}"
           class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
            Kembali
        </a>
    </div>

</div>

@endsection