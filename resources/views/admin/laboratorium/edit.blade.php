@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <h1 class="text-2xl font-bold text-gray-800 mb-6">
        Edit Laboratorium
    </h1>

    <form action="{{ route('laboratorium.update', $laboratory) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    Nama Laboratorium
                </label>

                <input
                    type="text"
                    name="nama"
                    value="{{ old('nama', $laboratory->nama) }}"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">

                @error('nama')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    Lokasi
                </label>

                <input
                    type="text"
                    name="lokasi"
                    value="{{ old('lokasi', $laboratory->lokasi) }}"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">

                @error('lokasi')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    Kapasitas
                </label>

                <input
                    type="number"
                    name="kapasitas"
                    value="{{ old('kapasitas', $laboratory->kapasitas) }}"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">

                @error('kapasitas')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

        </div>

        <div class="mt-8 flex gap-3">

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

                Update

            </button>

            <a
                href="{{ route('laboratorium.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection