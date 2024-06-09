<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'ADMIN',
        ]);

        User::create([
            'name' => 'Pembimbing Sekolah',
            'email' => 'sekolah@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'PEMBIMBING SEKOLAH',
        ]);

        User::create([
            'name' => 'Pembimbing Industri',
            'email' => 'industri@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'PEMBIMBING INDUSTRI',
        ]);

        User::create([
            'name' => 'Siswa',
            'email' => 'siswa@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'SISWA',
        ]);

        User::create([
            'name' => 'Siswa 1',
            'email' => 'siswa1@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'SISWA',
        ]);

        User::create([
            'name' => 'Siswa 2',
            'email' => 'siswa2@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'SISWA',
        ]);
    }
}
