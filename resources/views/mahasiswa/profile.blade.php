<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Profil Mahasiswa
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">

            @if (session('success'))
                <div class="bg-green-200 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-200 p-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('mahasiswa.profile.update') }}">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama</label>

                    <input type="text" name="nama" value="{{ old('nama', $mahasiswa->nama) }}"
                        class="w-full border rounded p-2">
                </div>

                <div class="mb-3">
                    <label>NIM</label>

                    <input type="text" name="nim" value="{{ old('nim', $mahasiswa->nim) }}"
                        class="w-full border rounded p-2">
                </div>

                <div class="mb-3">
                    <label>Prodi</label>

                    <select name="prodi" class="w-full border rounded p-2">

                        <option value="">-- Pilih Prodi --</option>

                        <option value="Teknik Informatika"
                            {{ $mahasiswa->prodi == 'Teknik Informatika' ? 'selected' : '' }}>
                            Teknik Informatika
                        </option>

                        <option value="Teknik Sipil" {{ $mahasiswa->prodi == 'Teknik Sipil' ? 'selected' : '' }}>
                            Teknik Sipil
                        </option>

                        <option value="Teknik Mesin" {{ $mahasiswa->prodi == 'Teknik Mesin' ? 'selected' : '' }}>
                            Teknik Mesin
                        </option>

                        <option value="Teknik Pertambangan"
                            {{ $mahasiswa->prodi == 'Teknik Pertambangan' ? 'selected' : '' }}>
                            Teknik Pertambangan
                        </option>

                    </select>
                </div>

                <div class="mb-3">
                    <label>Angkatan</label>

                    <select name="angkatan" class="w-full border rounded p-2">

                        @for ($i = date('Y'); $i >= 2020; $i--)
                            <option value="{{ $i }}" {{ $mahasiswa->angkatan == $i ? 'selected' : '' }}>

                                {{ $i }}

                            </option>
                        @endfor

                    </select>
                </div>

                <div class="mb-3">
                    <label>No HP</label>

                    <input type="text" name="no_hp" value="{{ old('no_hp', $mahasiswa->no_hp) }}"
                        class="w-full border rounded p-2">
                </div>

                <div class="mb-4">
                    <label>Alamat</label>

                    <textarea name="alamat" class="w-full border rounded p-2">{{ old('alamat', $mahasiswa->alamat) }}</textarea>
                </div>

                <button class="bg-blue-600 text-white px-5 py-2 rounded">

                    Simpan Profil

                </button>

            </form>

        </div>

    </div>

</x-app-layout>
