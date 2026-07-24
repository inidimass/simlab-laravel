@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <h1 class="text-2xl font-bold text-gray-800 mb-6">
        Edit Mahasiswa
    </h1>

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    NIM
                </label>

                <input
                    type="text"
                    name="nim"
                    value="{{ $mahasiswa->nim }}"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    Nama 
                </label>

                <input
                    type="text"
                    name="nama"
                    value="{{ $mahasiswa->nama }}"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    Prodi
                </label>

                <input
                    type="text"
                    name="prodi"
                    value="{{ $mahasiswa->prodi }}"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    Angkatan
                </label>

                <input
                    type="number"
                    name="angkatan"
                    value="{{ $mahasiswa->angkatan }}"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    No HP
                </label>

                <input
                    type="text"
                    name="no_hp"
                    value="{{ $mahasiswa->no_hp }}"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    Alamat
                </label>

                <textarea
                    name="alamat"
                    rows="4"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">{{ $mahasiswa->alamat }}</textarea>
            </div>

        </div>

        <div class="mt-8 flex gap-3">

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

                Update

            </button>

            <a
                href="{{ route('mahasiswa.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection