<aside class="w-64 bg-white border-r border-gray-200 shadow-sm min-h-screen">

    <div class="p-6 border-b">

        <h2 class="text-lg font-bold text-gray-800">
            Menu Admin
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            Dashboard SIMLAB
        </p>

    </div>

    <nav class="p-3 space-y-2">

        <a href="{{ url('/admin/dashboard') }}"
            class="block rounded-lg px-4 py-3 text-gray-700 hover:bg-blue-600 hover:text-white transition duration-200">
            Dashboard
        </a>

        <a href="{{ url('/admin/mahasiswa') }}"
            class="block rounded-lg px-4 py-3 text-gray-700 hover:bg-blue-600 hover:text-white transition duration-200">
            Mahasiswa
        </a>

        <a href="{{ url('/admin/dosen') }}"
            class="block rounded-lg px-4 py-3 text-gray-700 hover:bg-blue-600 hover:text-white transition duration-200">
            Dosen
        </a>

        <a href="{{ url('/admin/mata-kuliah') }}"
            class="block rounded-lg px-4 py-3 text-gray-700 hover:bg-blue-600 hover:text-white transition duration-200">
            Mata Kuliah
        </a>

        <a href="{{ url('/admin/praktikum') }}"
            class="block rounded-lg px-4 py-3 text-gray-700 hover:bg-blue-600 hover:text-white transition duration-200">
            Praktikum
        </a>

        <a href="{{ url('/admin/laboratorium') }}"
            class="block rounded-lg px-4 py-3 text-gray-700 hover:bg-blue-600 hover:text-white transition duration-200">
            Laboratorium
        </a>

        <a href="{{ url('/admin/komputer') }}"
            class="block rounded-lg px-4 py-3 text-gray-700 hover:bg-blue-600 hover:text-white transition duration-200">
            Komputer
        </a>

        <a href="{{ url('/admin/kelas-praktikum') }}"
            class="block rounded-lg px-4 py-3 text-gray-700 hover:bg-blue-600 hover:text-white transition duration-200">
            Kelas Praktikum
        </a>

        <a href="{{ url('/admin/jadwal') }}"
            class="block rounded-lg px-4 py-3 text-gray-700 hover:bg-blue-600 hover:text-white transition duration-200">
            Jadwal
        </a>

        <a href="{{ url('/admin/pendaftaran') }}"
            class="block rounded-lg px-4 py-3 text-gray-700 hover:bg-blue-600 hover:text-white transition duration-200">
            Pendaftaran
        </a>

        <a href="{{ url('/admin/detail-pendaftaran') }}"
            class="block rounded-lg px-4 py-3 text-gray-700 hover:bg-blue-600 hover:text-white transition duration-200">
            Detail Pendaftaran
        </a>

        <a href="{{ url('/admin/pembayaran') }}"
            class="block rounded-lg px-4 py-3 text-gray-700 hover:bg-blue-600 hover:text-white transition duration-200">
            Pembayaran
        </a>

    </nav>

</aside>