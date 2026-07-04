<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kependudukan; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Kode pembuatan akun Kades Afdal (atau akun lainnya)
        //User::create([
          //  'name' => 'Kades SIMPELDES Afdal Maulana',
            //'email' => 'afdal@kades.com',
            //'role' => 'kades',
            //'nik' => '3218000000000000',
            //'password' => Hash::make('afdal_kades'),
        //]);

        //Kependudukan Warga di kades
        Kependudukan::create([
            'nik' => '111222333444555', // Pastikan NIK ini sesuai
            'tempat_lahir' => 'Bangka',
            'tanggal_lahir' => '2002-05-12',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Jl. Merdeka No. 12',
            'rt_rw' => '002/001',
            'agama' => 'Islam',
            'pekerjaan' => 'Mahasiswa',
            'status_perkawinan' => 'Belum Kawin',
        ]);
    } 
}