@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Tambah Pembayaran
        </h1>
        <p class="text-gray-500 text-sm">
            Tambahkan data pembayaran pendaftaran baru.
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

    <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Pendaftaran</label>
            <select name="pendaftaran_id"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                <option value="">-- Pilih Pendaftaran --</option>
                @foreach($pendaftarans as $pendaftaran)
                    <option value="{{ $pendaftaran->id }}"
                        {{ old('pendaftaran_id') == $pendaftaran->id ? 'selected' : '' }}>
                        {{ $pendaftaran->mahasiswa->nama ?? '-' }} — {{ \Carbon\Carbon::parse($pendaftaran->tanggal_daftar)->format('d-m-Y') }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Total Bayar</label>
            <input type="number" step="0.01" name="total_bayar" value="{{ old('total_bayar') }}"
                   class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Tanggal Bayar</label>
            <input type="date" name="tanggal_bayar" value="{{ old('tanggal_bayar') }}"
                   class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Bukti Pembayaran</label>
            <input type="file" name="bukti_pembayaran" accept="image/*,.pdf"
                   class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-2">Status</label>
            <select name="status"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                <option value="Menunggu" {{ old('status') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="Diterima" {{ old('status') == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="Ditolak" {{ old('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>

        <div class="flex gap-2">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Simpan
            </button>

            <a href="{{ route('pembayaran.index') }}"
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
                Batal
            </a>
        </div>

    </form>

</div>

@endsection