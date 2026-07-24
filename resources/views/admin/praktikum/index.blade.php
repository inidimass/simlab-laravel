@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Data Praktikum
            </h1>
            <p class="text-gray-500 text-sm">
                Kelola seluruh data praktikum.
            </p>
        </div>

        <a href="{{ route('praktikum.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
            + Tambah Praktikum
        </a>
    </div>

    <div class="mb-6">
        <input
            type="text"
            placeholder="Cari praktikum..."
            class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full border border-gray-200">

            <thead class="bg-gray-100">
                <tr>

                    <th class="px-4 py-3 border">No</th>
                    <th class="px-4 py-3 border">Mata Kuliah</th>
                    <th class="px-4 py-3 border">Biaya</th>
                    <th class="px-4 py-3 border">Status</th>
                    <th class="px-4 py-3 border">Aksi</th>

                </tr>
            </thead>

            <tbody>

                @forelse($praktikums as $praktikum)

                    <tr>

                        <td class="border px-4 py-3">
                            {{ $loop->iteration }}
                        </td>

                        <td class="border px-4 py-3">
                            {{ $praktikum->mataKuliah->kode }} - {{ $praktikum->mataKuliah->nama }}
                        </td>

                        <td class="border px-4 py-3">
                            Rp {{ number_format($praktikum->biaya, 0, ',', '.') }}
                        </td>

                        <td class="border px-4 py-3">
                            @if($praktikum->status)
                                <span class="text-green-600 font-semibold">
                                    Aktif
                                </span>
                            @else
                                <span class="text-red-600 font-semibold">
                                    Tidak Aktif
                                </span>
                            @endif
                        </td>

                    <td class="border px-4 py-3">

                        <div class="flex gap-2">

                            <a href="{{ route('praktikum.show', $praktikum) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-black px-3 py-1 rounded">
                                Detail
                            </a>

                            <a href="{{ route('praktikum.edit', $praktikum) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-1 rounded">
                                Edit
                            </a>

                            <form action="{{ route('praktikum.destroy', $praktikum) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                @csrf
                                @method('DELETE')

                                <button
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

                        Belum ada data praktikum.

                     </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection