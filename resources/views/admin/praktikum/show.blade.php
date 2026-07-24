@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <div class="flex items-center justify-between mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Detail Praktikum
        </h1>

        <a href="{{ route('praktikum.index') }}"
           class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg">
            Kembali
        </a>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Mata Kuliah --}}
        <div>
            <label class="block mb-2 font-medium text-gray-700">
                Mata Kuliah
            </label>

            <input
                type="text"
                value="{{ $praktikum->mataKuliah->kode }} - {{ $praktikum->mataKuliah->nama }}"
                readonly
                class="w-full border rounded-lg px-4 py-2 bg-gray-100 text-gray-700">
        </div>

        {{-- Biaya --}}
        <div>
            <label class="block mb-2 font-medium text-gray-700">
                Biaya Praktikum
            </label>

            <input
                type="text"
                value="Rp {{ number_format($praktikum->biaya, 0, ',', '.') }}"
                readonly
                class="w-full border rounded-lg px-4 py-2 bg-gray-100 text-gray-700">
        </div>

        {{-- Status --}}
        <div>
            <label class="block mb-2 font-medium text-gray-700">
                Status
            </label>

            <input
                type="text"
                value="{{ $praktikum->status ? 'Aktif' : 'Tidak Aktif' }}"
                readonly
                class="w-full border rounded-lg px-4 py-2 bg-gray-100 text-gray-700">
        </div>

    </div>

</div>

@endsection