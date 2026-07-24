<?php

namespace Database\Seeders;

use App\Models\Praktikum;
use Illuminate\Database\Seeder;

class PraktikumSeeder extends Seeder
{
    public function run(): void
    {
        Praktikum::create([
            'mata_kuliah_id' => 1,
            'biaya' => 150000,
            'status' => true,
        ]);

        Praktikum::create([
            'mata_kuliah_id' => 2,
            'biaya' => 175000,
            'status' => true,
        ]);
    }
}
