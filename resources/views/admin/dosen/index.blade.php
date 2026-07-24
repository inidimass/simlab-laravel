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
                Data Dosen
            </h1>
            <p class="text-gray-500 text-sm">
                Kelola seluruh data dosen.
            </p>
        </div>

        <a href="{{ route('dosen.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
            + Tambah Dosen
        </a>
    </div>

    <div class="mb-6">
        <input
            type="text"
            placeholder="Cari dosen..."
            class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full border border-gray-200">

            <thead class="bg-gray-100">

                <tr>

                    <th class="px-4 py-3 border">No</th>
                    <th class="px-4 py-3 border">NIP</th>
                    <th class="px-4 py-3 border">Nama</th>
                    <th class="px-4 py-3 border">No HP</th>
                    <th class="px-4 py-3 border">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($dosens as $dosen)

                    <tr>

                        <td class="border px-4 py-2">
                             {{ $loop->iteration }}
                        </td>

                        <td class="border px-4 py-2">
                            {{ $dosen->nip }}
                        </td>

                        <td class="border px-4 py-2">
                           {{ $dosen->nama }}
                        </td>

                        <td class="border px-4 py-2">
                            {{ $dosen->no_hp }}
                        </td>

                        <td class="border px-4 py-2">

                            <div class="flex gap-2">

                                <a href="{{ route('dosen.show', $dosen->id) }}"
                                class="text-blue-600 hover:underline">

                                    Detail

                                </a>

                                <a href="{{ route('dosen.edit', $dosen->id) }}"
                                    class="text-yellow-600 hover:underline">

                                    Edit

                                </a>

                                <form action="{{ route('dosen.destroy', $dosen->id) }}"
                                    method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <form action="{{ route('dosen.destroy', $dosen->id) }}"
                                          method="POST"
                                          class="inline"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="text-red-600 hover:underline">
                                            Hapus
                                        </button>

                                    </form>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5"
                        class="text-center py-10 text-gray-500">

                            Belum ada data dosen.

                        </td>

                    </tr>

                @endforelse

</tbody>

        </table>

    </div>

</div>

@endsection