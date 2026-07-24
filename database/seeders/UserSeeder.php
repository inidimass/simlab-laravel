<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@simlab.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Dosen
        User::create([
            'name' => 'Dr. Budi Santoso',
            'email' => 'dosen@simlab.com',
            'password' => Hash::make('password'),
            'role' => 'dosen',
        ]);

        // Mahasiswa
        User::create([
            'name' => 'Dimas',
            'email' => 'mahasiswa@simlab.com',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
        ]);
    }
}
