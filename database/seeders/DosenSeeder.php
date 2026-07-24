<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    public function run(): void
    {
        Dosen::create([
            'user_id' => 2,
            'nip' => '1987654321',
            'nama' => 'Dr. Budi Santoso',
            'no_hp' => '081298765432',
        ]);
    }
}
