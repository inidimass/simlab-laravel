<?php

namespace Database\Seeders;

use App\Models\KelasPraktikum;
use Illuminate\Database\Seeder;

class KelasPraktikumSeeder extends Seeder
{
    public function run(): void
    {
        KelasPraktikum::create([
            'praktikum_id' => 1,
            'dosen_id' => 1,
            'laboratory_id' => 1,
            'nama_kelas' => 'A',
            'kuota' => 30,
            'kuota_terisi' => 0,
        ]);
    }
}
