<?php

namespace Database\Seeders;

use App\Models\MataKuliah;
use Illuminate\Database\Seeder;

class MataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        MataKuliah::create([
            'kode' => 'IF201',
            'nama' => 'Pemrograman Web',
            'semester' => 4,
            'sks' => 3,
        ]);

        MataKuliah::create([
            'kode' => 'IF202',
            'nama' => 'Basis Data',
            'semester' => 4,
            'sks' => 3,
        ]);
    }
}
