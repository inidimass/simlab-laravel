<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Dashboard Mahasiswa
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6 mb-6">
                <h1 class="text-3xl font-bold">
                    Halo, {{ Auth::user()->name }} 👋
                </h1>

                <p class="text-gray-500 mt-2">
                    Selamat datang di Sistem Informasi Manajemen Laboratorium (SIMLAB)
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-blue-500 text-white rounded-lg p-6 shadow">
                    <h3 class="font-semibold text-lg">
                        Status Pembayaran
                    </h3>

                    <p class="text-2xl mt-4 font-bold">
                        Belum Bayar
                    </p>
                </div>

                <div class="bg-green-500 text-white rounded-lg p-6 shadow">
                    <h3 class="font-semibold text-lg">
                        Praktikum
                    </h3>

                    <p class="text-2xl mt-4 font-bold">
                        Belum Memilih
                    </p>
                </div>

                <a href="{{ route('mahasiswa.jadwal') }}">

                    <div class="bg-yellow-500 text-white rounded-lg p-6 shadow hover:scale-105 transition">

                        <h3 class="font-semibold text-lg">
                            Jadwal
                        </h3>

                        <p class="text-2xl mt-4 font-bold">
                            Lihat Jadwal
                        </p>

                    </div>

                </a>

            </div>

        </div>
    </div>
    <div class="mt-8 flex flex-wrap gap-4">

        <a href="{{ route('mahasiswa.profile') }}"
            class="px-5 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">

            Profil Mahasiswa

        </a>

        @if ($profilLengkap)
            <a href="{{ route('mahasiswa.pendaftaran') }}"
                class="px-5 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">

                Daftar Praktikum

            </a>
        @else
            <button disabled class="px-5 py-3 bg-gray-400 text-white rounded-lg cursor-not-allowed">

                Lengkapi Profil Dulu

            </button>
        @endif

        <a href="{{ route('mahasiswa.pembayaran') }}"
            class="px-5 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700">

            Pembayaran

        </a>

    </div>

    @if (!$profilLengkap)
        <div class="mt-4 p-4 bg-yellow-100 border border-yellow-300 rounded">

            <b>Perhatian!</b><br>

            Lengkapi biodata terlebih dahulu agar dapat melakukan pendaftaran praktikum.

        </div>
    @endif
</x-app-layout>
