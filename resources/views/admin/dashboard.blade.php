<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Admin
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-blue-500 text-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold">Mahasiswa</h3>
                    <p class="text-3xl mt-2">{{ $mahasiswa }}</p>
                </div>

                <div class="bg-green-500 text-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold">Dosen</h3>
                    <p class="text-3xl mt-2">{{ $dosen }}</p>
                </div>

                <div class="bg-yellow-500 text-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold">Praktikum</h3>
                    <p class="text-3xl mt-2">{{ $praktikum }}</p>
                </div>

                <div class="bg-red-500 text-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold">Laboratorium</h3>
                    <p class="text-3xl mt-2">{{ $laboratory }}</p>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
