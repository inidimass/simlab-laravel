@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">
    
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
        /div>
    @endif

    <h1 class="text-2xl font-bold text-gray-800 mb-6">
        Edit Dosen
    </h1>

    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    NIP
                </label>

                <input
                    type="text"
                    name="nip"
                    value="{{ old('nip', $dosen->nip) }}"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    Nama Dosen
                </label>

                <input
                    type="text"
                    name="nama"
                    value="{{ old('nip', $dosen->nama) }}"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block mb-2 font-medium text-gray-700">
                    No HP
                </label>

                <input
                    type="number"
                    name="no_hp"
                    value="{{ old('nip', $dosen->no_hp) }}"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

        </div>

        <div class="mt-8 flex gap-3">

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

                Update

            </button>

            <a
                href="{{ route('dosen.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection