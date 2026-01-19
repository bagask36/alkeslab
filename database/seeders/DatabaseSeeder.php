<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Tambahkan ini
use Illuminate\Support\Facades\Hash; // Tambahkan ini
use Illuminate\Support\Str; // Tambahkan ini

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@alkeslabprimatama.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
