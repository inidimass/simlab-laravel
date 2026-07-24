@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Edit Jadwal
        </h1>
        <p class="text-gray-500 text-sm">
            Perbarui data jadwal praktikum.
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

    <form action="{{ route('jadwal.update', $jadwal) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Kelas Praktikum</label>
            <select name="kelas_praktikum_id"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                <option value="">-- Pilih Kelas Praktikum --</option>
                @foreach($kelasPraktikums as $kelasPraktikum)
                    <option value="{{ $kelasPraktikum->id }}"
                        {{ old('kelas_praktikum_id', $jadwal->kelas_praktikum_id) == $kelasPraktikum->id ? 'selected' : '' }}>
                        {{ $kelasPraktikum->nama_kelas }} — {{ $kelasPraktikum->praktikum->mataKuliah->nama ?? '-' }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Hari</label>
            <select name="hari"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                <option value="">-- Pilih Hari --</option>
                @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)
                    <option value="{{ $hari }}" {{ old('hari', $jadwal->hari) == $hari ? 'selected' : '' }}>
                        {{ $hari }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Jam Mulai</label>
            <input type="time" name="jam_mulai"
                   value="{{ old('jam_mulai', \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i')) }}"
                   class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-2">Jam Selesai</label>
            <input type="time" name="jam_selesai"
                   value="{{ old('jam_selesai', \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i')) }}"
                   class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <div class="flex gap-2">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Perbarui
            </button>

            <a href="{{ route('jadwal.index') }}"
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
                Batal
            </a>
        </div>

    </form>

</div>

@endsection