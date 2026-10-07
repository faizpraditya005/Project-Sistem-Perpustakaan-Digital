<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class BidangUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar akun bidang yang akan dimasukkan ke database
        $bidangUsers = [
            [
                'name' => 'Sekretariat', 
                'email' => 'sekretariat@bkd.jatengprov.go.id'
            ],
            [
                'name' => 'Bidang Pengembangan Kompetensi', 
                'email' => 'bangkom@bkd.jatengprov.go.id'
            ],
            [
                'name' => 'Bidang Mutasi dan Promosi', 
                'email' => 'mutasi@bkd.jatengprov.go.id'
            ],
            [
                'name' => 'Bidang Pembinaan dan Penilaian Kinerja', 
                'email' => 'pembinaan@bkd.jatengprov.go.id'
            ],
            [
                'name' => 'Bidang Pengadaan, Pemberhentian dan Informasi', 
                'email' => 'pengadaan@bkd.jatengprov.go.id'
            ],
        ];

        foreach ($bidangUsers as $userData) {
            // updateOrCreate mencegah data ganda (duplikat) jika seeder dijalankan 2x
            User::updateOrCreate(
                ['email' => $userData['email']], // Kunci pencarian
                [
                    'name' => $userData['name'],
                    // Password formalitas (karena login via tombol tidak mengecek password)
                    'password' => Hash::make('password123'), 
                ]
            );
        }
    }
}