@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Tambah Pendaftaran
        </h1>
        <p class="text-gray-500 text-sm">
            Tambahkan data pendaftaran mahasiswa baru.
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

    <form action="{{ route('pendaftaran.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Mahasiswa</label>
            <select name="mahasiswa_id"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                <option value="">-- Pilih Mahasiswa --</option>
                @foreach($mahasiswas as $mahasiswa)
                    <option value="{{ $mahasiswa->id }}"
                        {{ old('mahasiswa_id') == $mahasiswa->id ? 'selected' : '' }}>
                        {{ $mahasiswa->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Tanggal Daftar</label>
            <input type="date" name="tanggal_daftar" value="{{ old('tanggal_daftar') }}"
                   class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-2">Status</label>
            <select name="status"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                <option value="Belum Bayar" {{ old('status') == 'Belum Bayar' ? 'selected' : '' }}>Belum Bayar</option>
                <option value="Menunggu Verifikasi" {{ old('status') == 'Menunggu Verifikasi' ? 'selected' : '' }}>Menunggu Verifikasi</option>
                <option value="Lunas" {{ old('status') == 'Lunas' ? 'selected' : '' }}>Lunas</option>
            </select>
        </div>

        <div class="flex gap-2">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Simpan
            </button>

            <a href="{{ route('pendaftaran.index') }}"
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
                Batal
            </a>
        </div>

    </form>

</div>

@endsection