<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Dashboard Admin
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6 mb-6">
                <h1 class="text-3xl font-bold">
                    Selamat Datang, {{ Auth::user()->name }} 👋
                </h1>

                <p class="text-gray-500 mt-2">
                    Sistem Informasi Manajemen Laboratorium Komputer (SIMLAB)
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="bg-blue-500 text-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold">Mahasiswa</h3>
                    <p class="text-4xl mt-3 font-bold">{{ $mahasiswa }}</p>
                </div>

                <div class="bg-green-500 text-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold">Dosen</h3>
                    <p class="text-4xl mt-3 font-bold">{{ $dosen }}</p>
                </div>

                <div class="bg-yellow-500 text-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold">Praktikum</h3>
                    <p class="text-4xl mt-3 font-bold">{{ $praktikum }}</p>
                </div>

                <div class="bg-red-500 text-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold">Laboratorium</h3>
                    <p class="text-4xl mt-3 font-bold">{{ $laboratory }}</p>
                </div>

                <div class="bg-indigo-500 text-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold">Komputer</h3>
                    <p class="text-4xl mt-3 font-bold">{{ $computer }}</p>
                </div>

                <div class="bg-purple-500 text-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold">Kelas Praktikum</h3>
                    <p class="text-4xl mt-3 font-bold">{{ $kelas }}</p>
                </div>

                <div class="bg-pink-500 text-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold">Jadwal</h3>
                    <p class="text-4xl mt-3 font-bold">{{ $jadwal }}</p>
                </div>

                <div class="bg-orange-500 text-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold">Pendaftaran</h3>
                    <p class="text-4xl mt-3 font-bold">{{ $pendaftaran }}</p>
                </div>

                <div class="bg-gray-700 text-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold">Pembayaran</h3>
                    <p class="text-4xl mt-3 font-bold">{{ $pembayaran }}</p>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
