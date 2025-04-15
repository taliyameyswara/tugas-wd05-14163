<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Dokter',
            'alamat' => 'Jl. Dokter No. 1',
            'no_hp' => '081234567890',
            'email' => 'dokter@gmail.com',
            'role' => 'dokter',
            'password' => bcrypt('dokter123'),
        ]);

        User::create([
            'nama' => 'Pasien',
            'alamat' => 'Jl. pasien No. 1',
            'no_hp' => '081234567890',
            'email' => 'pasien@gmail.com',
            'role' => 'pasien',
            'password' => bcrypt('pasien123'),
        ]);
    }
}
