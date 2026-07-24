<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Pembayaran Praktikum
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-3xl mx-auto">

            @if(session('success'))
                <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif


            @if(!$pendaftaran)

                <div class="bg-yellow-100 p-4 rounded">
                    Kamu belum mendaftar praktikum.
                </div>

            @else

                <div class="bg-white shadow rounded p-5">

                    <p class="mb-2">
                        <b>Total Bayar :</b>

                        Rp {{ number_format($pendaftaran->detailPendaftarans->sum('harga'),0,',','.') }}
                    </p>

                    @if(!$pendaftaran->pembayaran)

                        <form
                            action="{{ route('mahasiswa.pembayaran.store') }}"
                            method="POST"
                            enctype="multipart/form-data">

                            @csrf

                            <input
                                type="file"
                                name="bukti_pembayaran"
                                class="mb-4">

                            <button
                                class="px-4 py-2 bg-green-600 text-white rounded">

                                Upload Bukti Pembayaran

                            </button>

                        </form>

                    @else

                        <hr class="my-4">

                        <p>
                            <b>Status :</b>

                            @if($pendaftaran->pembayaran->status=='Menunggu')

                                <span class="text-yellow-600 font-bold">
                                    Menunggu Verifikasi
                                </span>

                            @elseif($pendaftaran->pembayaran->status=='Diterima')

                                <span class="text-green-600 font-bold">
                                    Pembayaran Diterima
                                </span>

                            @else

                                <span class="text-red-600 font-bold">
                                    Pembayaran Ditolak
                                </span>

                            @endif

                        </p>

                        <p class="mt-2">
                            <b>Tanggal Upload :</b>

                            {{ $pendaftaran->pembayaran->tanggal_bayar }}
                        </p>

                        <p class="mt-2">

                            <a
                                href="{{ asset('storage/'.$pendaftaran->pembayaran->bukti_pembayaran) }}"
                                target="_blank"
                                class="text-blue-600 underline">

                                Lihat Bukti Pembayaran

                            </a>

                        </p>

                        @if($pendaftaran->pembayaran->status=='Ditolak')

                            <hr class="my-4">

                            <form
                                action="{{ route('mahasiswa.pembayaran.store') }}"
                                method="POST"
                                enctype="multipart/form-data">

                                @csrf

                                <input
                                    type="file"
                                    name="bukti_pembayaran"
                                    class="mb-4">

                                <button
                                    class="px-4 py-2 bg-red-600 text-white rounded">

                                    Upload Ulang

                                </button>

                            </form>

                        @endif

                    @endif

                </div>

            @endif

        </div>

    </div>

</x-app-layout>
