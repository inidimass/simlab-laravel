<aside class="w-64 bg-white shadow-md">

    <div class="p-6 border-b">
        <h2 class="text-lg font-bold text-gray-800">
            Menu Admin
        </h2>
    </div>

    <nav class="mt-4 space-y-1">

        <a href="{{ url('/admin/dashboard') }}" class="block px-6 py-3 text-gray-700 hover:bg-blue-100 hover:text-blue-600 transition">
            Dashboard
        </a>

        <a href="{{ url('/admin/mahasiswa') }}" class="block px-6 py-3 text-gray-700 hover:bg-blue-100 hover:text-blue-600 transition">
            Mahasiswa
        </a>

        <a href="{{ url('/admin/dosen') }}" class="block px-6 py-3 text-gray-700 hover:bg-blue-100 hover:text-blue-600 transition">
            Dosen
        </a>

        <a href="{{ url('/admin/mata-kuliah') }}" class="block px-6 py-3 text-gray-700 hover:bg-blue-100 hover:text-blue-600 transition">
            Mata Kuliah
        </a>

        <a href="{{ url('/admin/praktikum') }}" class="block px-6 py-3 text-gray-700 hover:bg-blue-100 hover:text-blue-600 transition">
            Praktikum
        </a>

        <a href="{{ url('/admin/laboratorium') }}" class="block px-6 py-3 text-gray-700 hover:bg-blue-100 hover:text-blue-600 transition">
            Laboratorium
        </a>

        <a href="{{ url('/admin/komputer') }}" class="block px-6 py-3 text-gray-700 hover:bg-blue-100 hover:text-blue-600 transition">
            Komputer
        </a>

        <a href="{{ url('/admin/kelas-praktikum') }}" class="block px-6 py-3 text-gray-700 hover:bg-blue-100 hover:text-blue-600 transition">
            Kelas Praktikum
        </a>

        <a href="{{ url('/admin/jadwal') }}" class="block px-6 py-3 text-gray-700 hover:bg-blue-100 hover:text-blue-600 transition">
            Jadwal
        </a>

    </nav>

</aside>