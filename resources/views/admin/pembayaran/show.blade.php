@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Detail Pembayaran
        </h1>
        <p class="text-gray-500 text-sm">
            Informasi lengkap data pembayaran.
        </p>
    </div>

    <div class="space-y-4">

        <div>
            <span class="block text-gray-500 text-sm">Mahasiswa</span>
            <span class="text-gray-800 font-medium">{{ $pembayaran->pendaftaran->mahasiswa->nama ?? '-' }}</span>
        </div>

        <div>
            <span class="block text-gray-500 text-sm">Total Bayar</span>
            <span class="text-gray-800 font-medium">
                Rp{{ number_format($pembayaran->total_bayar, 0, ',', '.') }}
            </span>
        </div>

        <div>
            <span class="block text-gray-500 text-sm">Tanggal Bayar</span>
            <span class="text-gray-800 font-medium">
                {{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->format('d-m-Y') }}
            </span>
        </div>

        <div>
            <span class="block text-gray-500 text-sm">Bukti Pembayaran</span>
            <div class="mt-1">
                @if($pembayaran->bukti_pembayaran)
                    <a href="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}"
                       target="_blank"
                       class="text-blue-600 underline text-sm">
                        Lihat bukti pembayaran
                    </a>
                @else
                    <span class="text-gray-500">-</span>
                @endif
            </div>
        </div>

        <div>
            <span class="block text-gray-500 text-sm">Status</span>
            <span class="text-gray-800 font-medium">
                @if($pembayaran->status === 'Diterima')
                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">Diterima</span>
                @elseif($pembayaran->status === 'Ditolak')
                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-sm">Ditolak</span>
                @else
                    <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-sm">Menunggu</span>
                @endif
            </span>
        </div>

    </div>

    <div class="mt-6 flex gap-2">
        <a href="{{ route('pembayaran.edit', $pembayaran) }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded-lg">
            Edit
        </a>

        <a href="{{ route('pembayaran.index') }}"
           class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
            Kembali
        </a>
    </div>

</div>

@endsection