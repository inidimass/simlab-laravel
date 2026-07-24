<x-app-layout>

    <x-slot name="header">
        <h2>Pembayaran Praktikum</h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-3xl mx-auto">

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

            @if ($pendaftaran)
                <p class="mb-3">

                    <b>Total Bayar :</b>

                    Rp {{ number_format($pendaftaran->detailPendaftarans->sum('harga'), 0, ',', '.') }}

                </p>

                <form method="POST" action="{{ route('mahasiswa.pembayaran.store') }}" enctype="multipart/form-data">

                    @csrf

                    <input type="file" name="bukti_pembayaran" class="mb-4">

                    <button class="px-4 py-2 bg-green-600 text-white rounded">

                        Upload Bukti

                    </button>

                </form>
            @else
                Belum ada pendaftaran.
            @endif

        </div>

    </div>

</x-app-layout>
