<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Dashboard Dosen
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6 mb-6">
                <h1 class="text-3xl font-bold">
                    Selamat Datang, {{ Auth::user()->name }} 👋
                </h1>

                <p class="text-gray-500 mt-2">
                    Dashboard Dosen SIMLAB
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-green-500 text-white rounded-lg p-6 shadow">
                    <h3 class="font-semibold text-lg">
                        Kelas Mengajar
                    </h3>

                    <p class="text-2xl mt-4 font-bold">
                        0
                    </p>
                </div>

                <div class="bg-blue-500 text-white rounded-lg p-6 shadow">
                    <h3 class="font-semibold text-lg">
                        Jadwal Mengajar
                    </h3>

                    <p class="text-2xl mt-4 font-bold">
                        Belum Ada
                    </p>
                </div>

                <div class="bg-purple-500 text-white rounded-lg p-6 shadow">
                    <h3 class="font-semibold text-lg">
                        Mahasiswa
                    </h3>

                    <p class="text-2xl mt-4 font-bold">
                        0
                    </p>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
