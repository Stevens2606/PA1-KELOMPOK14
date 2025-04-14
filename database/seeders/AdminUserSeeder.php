<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah sudah ada admin, jika ada, jangan buat lagi
        
            User::create([
                'name' => 'Administrator', // Ganti dengan nama yang Anda inginkan
                'email' => 'admin@example.com', // Ganti dengan email admin Anda
                'password' => Hash::make('password'), // Ganti dengan password yang lebih kuat!
                'is_admin' => true,
            ]);
    }
}