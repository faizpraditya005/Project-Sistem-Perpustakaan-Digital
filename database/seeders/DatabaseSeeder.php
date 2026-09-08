<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun khusus Pengembang / Admin Utama Perpustakaan BKD
        User::factory()->create([
            'name' => 'Tim Pengembang BKD',
            'email' => 'admin.perpus@bkd.jatengprov.go.id',
            'password' => Hash::make('bkdjateng2026'), // Kata sandi otomatis terenkripsi aman Bcrypt
        ]);

        // 2. Akun contoh Bidang A ASN BKD untuk simulasi membaca referensi
        User::factory()->create([
            'name' => 'Bidang A BKD',
            'email' => 'Bidang.A@bkd.jatengprov.go.id',
            'password' => Hash::make('BidangA123'),
        ]);
    }
}
