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
            'username' => 'fajar',
            'password' => Hash::make('321'),
            'nama_lengkap' => 'M.Fajar Pratama',
            'email' => 'fajar@gmail.com',
            'level' => 'Super Admin',
        ]);

        DB::table('users')->insert([
            'username' => 'smith',
            'password' => Hash::make('321'),
            'nama_lengkap' => 'Smith Willyams T',
            'email' => 'smith@gmail.com',
            'level' => 'Admin Biasa',
        ]);
    }
}
