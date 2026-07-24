@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-xl shadow-md border border-gray-100 p-6">

    @if(session('success'))
        <div class="mb-6 p-4 rounded-lg border border-green-300 bg-green-100 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex items-center justify-between mb-6">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Data Mahasiswa
            </h1>

            <p class="text-gray-500 mt-1">
                Kelola seluruh data mahasiswa.
            </p>
        </div>

        <a href="{{ route('mahasiswa.create') }}"
            class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg shadow transition duration-200">

            + Tambah Mahasiswa

        </a>

    </div>

    <div class="mb-6">

        <input
            type="text"
            placeholder="Cari mahasiswa..."
            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">

    </div>

    <div class="overflow-x-auto rounded-lg border border-gray-200">

        <table class="min-w-full">

            <thead class="bg-gray-50">

                <tr class="text-xs uppercase tracking-wider text-gray-600">

                    <th class="px-4 py-3 text-center">No</th>
                    <th class="px-4 py-3 text-left">NIM</th>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">Prodi</th>
                    <th class="px-4 py-3 text-center">Angkatan</th>
                    <th class="px-4 py-3 text-left">No HP</th>
                    <th class="px-4 py-3 text-center">Aksi</th>

                </tr>

            </thead>

            <tbody class="divide-y divide-gray-100">

                @forelse($mahasiswas as $mahasiswa)

                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-4 py-3 text-center">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $mahasiswa->nim }}
                        </td>

                        <td class="px-4 py-3 font-medium text-gray-800">
                            {{ $mahasiswa->nama }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $mahasiswa->prodi }}
                        </td>

                        <td class="px-4 py-3 text-center">
                            {{ $mahasiswa->angkatan }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $mahasiswa->no_hp }}
                        </td>

                        <td class="px-4 py-3">

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-3 py-1 rounded transition">
                                    Detail
                                </a>

                                <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm px-3 py-1 rounded transition">
                                    Edit
                                </a>

                                <form
                                    action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white text-sm px-3 py-1 rounded transition">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="py-12 text-center">

                            <div class="text-lg text-gray-400">
                                Belum ada data mahasiswa.
                            </div>

                            <p class="text-sm text-gray-500 mt-2">
                                Silakan tambahkan data mahasiswa terlebih dahulu.
                            </p>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection