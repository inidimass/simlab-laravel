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
                Data Laboratorium
            </h1>
            <p class="text-gray-500 text-sm">
                Kelola seluruh data laboratorium.
            </p>
        </div>

        <a href="{{ route('laboratorium.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
            + Tambah Laboratorium
        </a>
    </div>

    <div class="mb-6">
        <input
            type="text"
            placeholder="Cari laboratorium..."
            class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full border border-gray-200">

            <thead class="bg-gray-100">

                <tr>

                    <th class="px-4 py-3 border">No</th>
                    <th class="px-4 py-3 border">Nama Laboratorium</th>
                    <th class="px-4 py-3 border">Lokasi</th>
                    <th class="px-4 py-3 border">Kapasitas</th>
                    <th class="px-4 py-3 border">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($laboratories as $laboratory)

                    <tr>

                        <td class="border px-4 py-3">
                            {{ $loop->iteration }}
                        </td>

                        <td class="border px-4 py-3">
                            {{ $laboratory->nama }}
                        </td>

                        <td class="border px-4 py-3">
                            {{ $laboratory->lokasi }}
                        </td>

                        <td class="border px-4 py-3">
                            {{ $laboratory->kapasitas }}
                        </td>

                        <td class="border px-4 py-3">

                            <div class="flex gap-2">

                                <a href="{{ route('laboratorium.show', $laboratory) }}"
                                   class="bg-blue-500 hover:bg-blue-600 text-black px-3 py-1 rounded">
                                    Detail
                                </a>

                                <a href="{{ route('laboratorium.edit', $laboratory) }}"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-1 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('laboratorium.destroy', $laboratory) }}"
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

                            Belum ada data laboratorium.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection