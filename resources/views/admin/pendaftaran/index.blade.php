@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Data Pendaftaran
            </h1>
            <p class="text-gray-500 text-sm">
                Kelola seluruh data pendaftaran mahasiswa.
            </p>
        </div>

        <a href="{{ route('pendaftaran.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
            + Tambah Pendaftaran
        </a>
    </div>

    <div class="mb-6">
        <input
            type="text"
            placeholder="Cari pendaftaran..."
            class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full border border-gray-200">

            <thead class="bg-gray-100">

                <tr>

                    <th class="px-4 py-3 border">No</th>
                    <th class="px-4 py-3 border">Mahasiswa</th>
                    <th class="px-4 py-3 border">Tanggal Daftar</th>
                    <th class="px-4 py-3 border">Status</th>
                    <th class="px-4 py-3 border">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($pendaftarans as $pendaftaran)

                    <tr>

                        <td class="border px-4 py-3">
                            {{ $loop->iteration }}
                        </td>

                        <td class="border px-4 py-3">
                            {{ $pendaftaran->mahasiswa->nama ?? '-' }}
                        </td>

                        <td class="border px-4 py-3">
                            {{ \Carbon\Carbon::parse($pendaftaran->tanggal_daftar)->format('d-m-Y') }}
                        </td>

                        <td class="border px-4 py-3">

                            @if($pendaftaran->status === 'Lunas')
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">Lunas</span>
                            @elseif($pendaftaran->status === 'Menunggu Verifikasi')
                                <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-sm">Menunggu Verifikasi</span>
                            @else
                                <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-sm">Belum Bayar</span>
                            @endif

                        </td>

                        <td class="border px-4 py-3">

                            <div class="flex gap-2">

                                <a href="{{ route('pendaftaran.show', $pendaftaran) }}"
                                   class="bg-blue-500 hover:bg-blue-600 text-black px-3 py-1 rounded">
                                    Detail
                                </a>

                                <a href="{{ route('pendaftaran.edit', $pendaftaran) }}"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-1 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('pendaftaran.destroy', $pendaftaran) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5"
                            class="text-center py-10 text-gray-500">

                            Belum ada data pendaftaran.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection