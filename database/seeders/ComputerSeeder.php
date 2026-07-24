<?php

namespace Database\Seeders;

use App\Models\Computer;
use Illuminate\Database\Seeder;

class ComputerSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Computer::create([
                'laboratory_id' => 1,
                'kode_pc' => 'LABA-PC' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'spesifikasi' => 'Intel Core i5, RAM 8GB, SSD 256GB',
                'status' => 'aktif',
            ]);
        }
    }
}
