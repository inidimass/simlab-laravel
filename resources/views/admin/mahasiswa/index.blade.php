@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Data Mahasiswa
            </h1>
            <p class="text-gray-500 text-sm">
                Kelola seluruh data mahasiswa.
            </p>
        </div>

        <a href="#"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
            + Tambah Mahasiswa
        </a>
    </div>

    <div class="mb-6">
        <input
            type="text"
            placeholder="Cari mahasiswa..."
            class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full border border-gray-200">

            <thead class="bg-gray-100">

                <tr>

                    <th class="px-4 py-3 border">No</th>
                    <th class="px-4 py-3 border">NIM</th>
                    <th class="px-4 py-3 border">Nama</th>
                    <th class="px-4 py-3 border">Program Studi</th>
                    <th class="px-4 py-3 border">Aksi</th>

                </tr>

            </thead>

            <tbody>

                <tr>

                    <td colspan="5"
                        class="text-center py-10 text-gray-500">

                        Belum ada data mahasiswa.

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection