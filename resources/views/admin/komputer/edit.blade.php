@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Edit Komputer
        </h1>
        <p class="text-gray-500 text-sm">
            Perbarui data komputer.
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

    <form action="{{ route('komputer.update', $computer) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Laboratorium</label>
            <select name="laboratory_id"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                <option value="">-- Pilih Laboratorium --</option>
                @foreach($laboratories as $laboratory)
                    <option value="{{ $laboratory->id }}"
                        {{ old('laboratory_id', $computer->laboratory_id) == $laboratory->id ? 'selected' : '' }}>
                        {{ $laboratory->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Kode PC</label>
            <input type="text" name="kode_pc" value="{{ old('kode_pc', $computer->kode_pc) }}"
                   class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Spesifikasi</label>
            <textarea name="spesifikasi" rows="4"
                      class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">{{ old('spesifikasi', $computer->spesifikasi) }}</textarea>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-2">Status</label>
            <select name="status"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                <option value="aktif" {{ old('status', $computer->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="rusak" {{ old('status', $computer->status) == 'rusak' ? 'selected' : '' }}>Rusak</option>
                <option value="maintenance" {{ old('status', $computer->status) == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
            </select>
        </div>

        <div class="flex gap-2">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Perbarui
            </button>

            <a href="{{ route('komputer.index') }}"
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
                Batal
            </a>
        </div>

    </form>

</div>

@endsection