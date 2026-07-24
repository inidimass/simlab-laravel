<x-app-layout>

    <x-slot name="header">
        <h2>Pendaftaran Praktikum</h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-4xl mx-auto">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-200 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 p-4 bg-red-200 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('mahasiswa.pendaftaran.store') }}">

                @csrf

                <label class="block mb-2">
                    Pilih Kelas Praktikum
                </label>

                <select name="kelas_praktikum_id" class="border rounded w-full p-2">

                    @foreach ($kelas as $item)
                        <option value="{{ $item->id }}">

                            {{ $item->praktikum->mataKuliah->nama }}

                            -

                            {{ $item->nama_kelas }}

                            |

                            Kuota :

                            {{ $item->kuota_terisi }}

                            /

                            {{ $item->kuota }}

                        </option>
                    @endforeach

                </select>

                <button type="submit" class="mt-4 px-4 py-2 bg-black-100 text-black rounded hover:bg-blue-700">
                    Daftar Praktikum
                </button>

            </form>

        </div>

    </div>

</x-app-layout>
