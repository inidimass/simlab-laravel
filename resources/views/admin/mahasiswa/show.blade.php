@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <div class="flex items-center justify-between mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Detail Mahasiswa
        </h1>

        <a href="{{ route('mahasiswa.index') }}"
           class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg">
            Kembali
        </a>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
            <label class="block mb-2 font-medium text-gray-700">
                NIM
            </label>

            <input
                type="text"
                value="{{ $mahasiswa->nim }}"
                readonly
                class="w-full border rounded-lg px-4 py-2 bg-gray-100 text-gray-700">
        </div>

        <div>
            <label class="block mb-2 font-medium text-gray-700">
                Nama 
            </label>

            <input
                type="text"
                value="{{ $mahasiswa->nama }}"
                readonly
                class="w-full border rounded-lg px-4 py-2 bg-gray-100 text-gray-700">
        </div>

        <div>
            <label class="block mb-2 font-medium text-gray-700">
                Prodi
            </label>

            <input
                type="text"
                value="{{ $mahasiswa->prodi }}"
                readonly
                class="w-full border rounded-lg px-4 py-2 bg-gray-100 text-gray-700">
        </div>

        <div>
            <label class="block mb-2 font-medium text-gray-700">
                Angkatan
            </label>

            <input
                type="text"
                value="{{ $mahasiswa->angkatan }}"
                readonly
                class="w-full border rounded-lg px-4 py-2 bg-gray-100 text-gray-700">
        </div>

        <div>
            <label class="block mb-2 font-medium text-gray-700">
                No HP
            </label>

            <input
                type="text"
                value="{{ $mahasiswa->no_hp }}"
                readonly
                class="w-full border rounded-lg px-4 py-2 bg-gray-100 text-gray-700">
        </div>

        <div>
            <label class="block mb-2 font-medium text-gray-700">
                Alamat
            </label>

            <textarea
                readonly
                rows="4"
                class="w-full border rounded-lg px-4 py-2 bg-gray-100 text-gray-700">{{ $mahasiswa->alamat }}</textarea>
        </div>

    </div>

</div>

@endsection