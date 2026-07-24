<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            MahasiswaSeeder::class,
            DosenSeeder::class,
            MataKuliahSeeder::class,
            PraktikumSeeder::class,
            LaboratorySeeder::class,
            ComputerSeeder::class,
            KelasPraktikumSeeder::class,
            JadwalSeeder::class,
        ]);
    }
}
