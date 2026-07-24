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
                Data Mata Kuliah
            </h1>
            <p class="text-gray-500 text-sm">
                Kelola seluruh data mata kuliah.
            </p>
        </div>

        <a href="{{ route('mata-kuliah.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
            + Tambah Mata Kuliah
        </a>
    </div>

    <div class="mb-6">
        <input
            type="text"
            placeholder="Cari mata kuliah..."
            class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full border border-gray-200">

            <thead class="bg-gray-100">

                <tr>
                    <th class="px-4 py-3 border">No</th>
                    <th class="px-4 py-3 border">Kode MK</th>
                    <th class="px-4 py-3 border">Nama Mata Kuliah</th>
                    <th class="px-4 py-3 border">Semester</th>
                    <th class="px-4 py-3 border">SKS</th>
                    <th class="px-4 py-3 border">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($mataKuliahs as $mataKuliah)

                    <tr>

                        <td class="px-4 py-3 border">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-4 py-3 border">
                            {{ $mataKuliah->kode }}
                        </td>

                        <td class="px-4 py-3 border">
                            {{ $mataKuliah->nama }}
                        </td>

                        <td class="px-4 py-3 border">
                            {{ $mataKuliah->semester }}
                        </td>

                        <td class="px-4 py-3 border">
                            {{ $mataKuliah->sks }}
                        </td>

                        <td class="px-4 py-3 border">

                            <div class="flex gap-2">

                                <a href="{{ route('mata-kuliah.show', $mataKuliah->id) }}"
                                   class="bg-green-500 hover:bg-green-600 text-black px-3 py-1 rounded">
                                    Detail
                                </a>

                                <a href="{{ route('mata-kuliah.edit', $mataKuliah->id) }}"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-1 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('mata-kuliah.destroy', $mataKuliah->id) }}"
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

                        <td colspan="6"
                            class="text-center py-10 text-gray-500">

                            Belum ada data mata kuliah.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection