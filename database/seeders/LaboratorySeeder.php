<?php

namespace Database\Seeders;

use App\Models\Laboratory;
use Illuminate\Database\Seeder;

class LaboratorySeeder extends Seeder
{
    public function run(): void
    {
        Laboratory::create([
            'nama' => 'Laboratorium Komputer A',
            'lokasi' => 'Gedung A Lantai 2',
            'kapasitas' => 40,
        ]);

        Laboratory::create([
            'nama' => 'Laboratorium Komputer B',
            'lokasi' => 'Gedung A Lantai 3',
            'kapasitas' => 30,
        ]);
    }
}
