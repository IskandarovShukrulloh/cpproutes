<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // для хэша пароля

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Создаём администратора без фабрики
        User::create([
            'fullname' => 'Shukrulloh',
            'username' => 'admin',
            'email'    => 'iskandarov.sh8228@gmail.com',
            'password' => Hash::make('123456789'),
            'role'     => 'admin',
        ]);
    }
}
