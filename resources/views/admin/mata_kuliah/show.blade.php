@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <div class="flex items-center justify-between mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Detail Mata Kuliah
        </h1>

        <a href="#"
           class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg">
            Kembali
        </a>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
            <label class="block mb-2 font-medium text-gray-700">
                Kode Mata Kuliah
            </label>

            <input
                type="text"
                value="220101001"
                readonly
                class="w-full border rounded-lg px-4 py-2 bg-gray-100 text-gray-700">
        </div>

        <div>
            <label class="block mb-2 font-medium text-gray-700">
                Nama Mata Kuliah
            </label>

            <input
                type="text"
                value="Ferry"
                readonly
                class="w-full border rounded-lg px-4 py-2 bg-gray-100 text-gray-700">
        </div>

        <div>
            <label class="block mb-2 font-medium text-gray-700">
                Jumlah SKS
            </label>

            <input
                type="text"
                value="Teknik Informatika"
                readonly
                class="w-full border rounded-lg px-4 py-2 bg-gray-100 text-gray-700">
        </div>

    </div>

</div>

@endsection