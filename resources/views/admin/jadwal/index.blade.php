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
                Data Jadwal
            </h1>
            <p class="text-gray-500 text-sm">
                Kelola seluruh data jadwal praktikum.
            </p>
        </div>

        <a href="{{ route('jadwal.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
            + Tambah Jadwal
        </a>
    </div>

    <div class="mb-6">
        <input
            type="text"
            placeholder="Cari jadwal..."
            class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full border border-gray-200">

            <thead class="bg-gray-100">

                <tr>

                    <th class="px-4 py-3 border">No</th>
                    <th class="px-4 py-3 border">Kelas Praktikum</th>
                    <th class="px-4 py-3 border">Mata Kuliah</th>
                    <th class="px-4 py-3 border">Dosen</th>
                    <th class="px-4 py-3 border">Hari</th>
                    <th class="px-4 py-3 border">Jam</th>
                    <th class="px-4 py-3 border">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($jadwals as $jadwal)

                    <tr>

                        <td class="border px-4 py-3">
                            {{ $loop->iteration }}
                        </td>

                        <td class="border px-4 py-3">
                            {{ $jadwal->kelasPraktikum->nama_kelas ?? '-' }}
                        </td>

                        <td class="border px-4 py-3">
                            {{ $jadwal->kelasPraktikum->praktikum->mataKuliah->nama ?? '-' }}
                        </td>

                        <td class="border px-4 py-3">
                            {{ $jadwal->kelasPraktikum->dosen->nama ?? '-' }}
                        </td>

                        <td class="border px-4 py-3">
                            {{ $jadwal->hari }}
                        </td>

                        <td class="border px-4 py-3">
                            {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}
                            -
                            {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}
                        </td>

                        <td class="border px-4 py-3">

                            <div class="flex gap-2">

                                <a href="{{ route('jadwal.show', $jadwal) }}"
                                   class="bg-blue-500 hover:bg-blue-600 text-black px-3 py-1 rounded">
                                    Detail
                                </a>

                                <a href="{{ route('jadwal.edit', $jadwal) }}"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-1 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('jadwal.destroy', $jadwal) }}"
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

                        <td colspan="7"
                            class="text-center py-10 text-gray-500">

                            Belum ada data jadwal.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection