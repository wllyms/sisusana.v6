<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'username' => 'super',
            'password' => Hash::make('12diklit34'),
            'nama_lengkap' => 'Team IT',
            'email' => 'teamit@gmail.com',
            'level' => 'Super Admin',
        ]);

        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('diklit1234'),
            'nama_lengkap' => 'admin',
            'email' => 'admin@gmail.com',
            'level' => 'Admin Biasa',
        ]);
    }
}
