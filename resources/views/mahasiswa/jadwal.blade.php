<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl">
            Jadwal Praktikum
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-5xl mx-auto">
            @if (isset($pesan))
                <div class="bg-yellow-100 border border-yellow-300 rounded-lg p-4 mb-4">
                    {{ $pesan }}
                </div>
            @else
                @if (!$pendaftaran)

                    <div class="bg-yellow-100 p-4 rounded">
                        Kamu belum mendaftar praktikum.
                    </div>
                @else
                    @foreach ($pendaftaran->detailPendaftarans as $detail)
                        <div class="bg-white shadow rounded-lg p-6 mb-5">

                            <h2 class="text-xl font-bold mb-2">
                                {{ $detail->kelasPraktikum->praktikum->mataKuliah->nama }}
                            </h2>

                            <p>
                                <b>Kelas :</b>
                                {{ $detail->kelasPraktikum->nama_kelas }}
                            </p>

                            <p>
                                <b>Laboratorium :</b>
                                {{ $detail->kelasPraktikum->laboratory->nama }}
                            </p>

                            <p>
                                <b>Dosen :</b>
                                {{ $detail->kelasPraktikum->dosen->nama }}
                            </p>

                            <hr class="my-3">

                            @forelse($detail->kelasPraktikum->jadwals as $jadwal)
                                <div class="border rounded p-3 mb-2">

                                    <p>
                                        <b>Hari :</b>
                                        {{ $jadwal->hari }}
                                    </p>

                                    <p>
                                        <b>Jam :</b>
                                        {{ $jadwal->jam_mulai }}
                                        -
                                        {{ $jadwal->jam_selesai }}
                                    </p>

                                </div>

                            @empty

                                <p class="text-gray-500">
                                    Jadwal belum dibuat.
                                </p>
                            @endforelse

                        </div>
                    @endforeach

                @endif
            @endif
        </div>

    </div>

</x-app-layout>
