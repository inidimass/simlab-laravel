@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <h1 class="text-2xl font-bold text-gray-800 mb-6">
        Tambah Praktikum
    </h1>

    <form action="{{ route('praktikum.store') }}" method="POST">

        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Mata Kuliah --}}
            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    Mata Kuliah
                </label>

                <select
                    name="mata_kuliah_id"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">

                    <option value="">-- Pilih Mata Kuliah --</option>

                    @foreach($mataKuliahs as $mk)
                        <option value="{{ $mk->id }}">
                            {{ $mk->kode }} - {{ $mk->nama }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- Biaya --}}
            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    Biaya Praktikum
                </label>

                <input
                    type="number"
                    name="biaya"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            {{-- Status --}}
            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">

                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>

                </select>
            </div>

        </div>

        <div class="mt-8 flex gap-3">

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

                Simpan

            </button>

            <a
                href="{{ route('praktikum.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection