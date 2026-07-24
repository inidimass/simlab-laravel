@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Data Kelas Praktikum
            </h1>
            <p class="text-gray-500 text-sm">
                Kelola seluruh data kelas praktikum.
            </p>
        </div>

        <a href="#"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
            + Tambah Kelas Praktikum
        </a>
    </div>

    <div class="mb-6">
        <input
            type="text"
            placeholder="Cari kelas praktikum..."
            class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full border border-gray-200">

            <thead class="bg-gray-100">

                <tr>

                    <th class="px-4 py-3 border">No</th>
                    <th class="px-4 py-3 border">Kode Kelas Praktikum</th>
                    <th class="px-4 py-3 border">Nama Kelas Praktikum</th>
                    <th class="px-4 py-3 border">Kuota</th>
                    <th class="px-4 py-3 border">Aksi</th>

                </tr>

            </thead>

            <tbody>

                <tr>

                    <td colspan="5"
                        class="text-center py-10 text-gray-500">

                        Belum ada data kelas praktikum.

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection