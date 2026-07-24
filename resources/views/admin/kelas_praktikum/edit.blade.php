@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Edit Kelas Praktikum
        </h1>
        <p class="text-gray-500 text-sm">
            Perbarui data kelas praktikum.
        </p>
    </div>

    @if($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kelas_praktikum.update', $kelasPraktikum) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Praktikum</label>
            <select name="praktikum_id"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                <option value="">-- Pilih Praktikum --</option>
                @foreach($praktikums as $praktikum)
                    <option value="{{ $praktikum->id }}"
                        {{ old('praktikum_id', $kelasPraktikum->praktikum_id) == $praktikum->id ? 'selected' : '' }}>
                        {{ $praktikum->mataKuliah->nama ?? '-' }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Dosen</label>
            <select name="dosen_id"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                <option value="">-- Pilih Dosen --</option>
                @foreach($dosens as $dosen)
                    <option value="{{ $dosen->id }}"
                        {{ old('dosen_id', $kelasPraktikum->dosen_id) == $dosen->id ? 'selected' : '' }}>
                        {{ $dosen->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Laboratorium</label>
            <select name="laboratory_id"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                <option value="">-- Pilih Laboratorium --</option>
                @foreach($laboratories as $laboratory)
                    <option value="{{ $laboratory->id }}"
                        {{ old('laboratory_id', $kelasPraktikum->laboratory_id) == $laboratory->id ? 'selected' : '' }}>
                        {{ $laboratory->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Nama Kelas</label>
            <input type="text" name="nama_kelas" value="{{ old('nama_kelas', $kelasPraktikum->nama_kelas) }}"
                   class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Kuota</label>
            <input type="number" name="kuota" value="{{ old('kuota', $kelasPraktikum->kuota) }}" min="1"
                   class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-2">Kuota Terisi</label>
            <input type="number" name="kuota_terisi" value="{{ old('kuota_terisi', $kelasPraktikum->kuota_terisi) }}" min="0"
                   class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <div class="flex gap-2">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Perbarui
            </button>

            <a href="{{ route('kelas_praktikum.index') }}"
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
                Batal
            </a>
        </div>

    </form>

</div>

@endsection