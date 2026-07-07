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
        // Membuat Akun
        User::create([
            'name'     => 'Kepala Desa SIMPELDES Afdal Maulana',
            'email'    => 'afdal@kades.com',
            'password' => Hash::make('afdal_kades'),
            'role'     => 'kades',
        ]);
    }
}