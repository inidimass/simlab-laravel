<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        Mahasiswa::create([
            'user_id' => 3,
            'nim' => '230001',
            'nama' => 'Dimas',
            'prodi' => 'Informatika',
            'angkatan' => 2023,
            'no_hp' => '081234567890',
            'alamat' => 'Jakarta',
        ]);
    }
}
