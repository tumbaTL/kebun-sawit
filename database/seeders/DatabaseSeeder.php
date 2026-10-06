<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Pemilik Kebun',
            'role' => 'pemilik',
            'email' => 'pemilik@kebun.com',
            'password' => bcrypt('password123'),
        ]);

        User::create([
            'name' => 'Staf Kebun',
            'role' => 'staf',
            'email' => 'staf@kebun.com',
            'password' => bcrypt('password123'),
        ]);

        User::create([
            'name' => 'Pekerja Kebun',
            'role' => 'pekerja',
            'email' => 'pekerja@kebun.com',
            'password' => bcrypt('password123'),
        ]);
    }
}