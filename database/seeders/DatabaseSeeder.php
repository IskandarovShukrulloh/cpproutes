<?php

namespace Database\Seeders;

use App\Models\Module;
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
            'password' => Hash::make('123456'),
            'role'     => 'admin',
        ]);
        User::create([
            'fullname' => 'Aliev Alijon',
            'username' => 'ali9',
            'email'    => 'alijon_a@mail.ru',
            'password' => Hash::make('123456'),
            'role'     => 'user',
        ]);
        User::create([
            'fullname' => 'Olimi Muhammadjon',
            'username' => 'olimi',
            'email'    => 'meid_nine@gmail.com',
            'password' => Hash::make('123456'),
            'role'     => 'user',
        ]);

        // ===== Юзер 1 (4 модуля) =====
        Module::create([
            'title' => 'Введение в C++',
            'description' => 'Обзор языка C++, его возможности и структура программы.',
            'user_id' => 1,
            'is_active' => 1
        ]);

        Module::create([
            'title' => 'Переменные и типы данных',
            'description' => 'Изучение переменных, типов данных и базовых операций с ними.',
            'user_id' => 1,
            'is_active' => 1
        ]);

        Module::create([
            'title' => 'Арифметические операции',
            'description' => 'Сложение, вычитание, умножение, деление и приоритет операций.',
            'user_id' => 1,
            'is_active' => 1
        ]);

        Module::create([
            'title' => 'Условия (if, switch)',
            'description' => 'Ветвления и принятие решений в программе.',
            'user_id' => 1,
            'is_active' => 1
        ]);

        // ===== Юзер 2 (3 модуля) =====
        Module::create([
            'title' => 'Циклы (for, while, do-while)',
            'description' => 'Повторяющиеся действия и циклы в C++.',
            'user_id' => 2,
            'is_active' => 1
        ]);

        Module::create([
            'title' => 'Массивы',
            'description' => 'Работа с одномерными и многомерными массивами.',
            'user_id' => 2,
            'is_active' => 1
        ]);

        Module::create([
            'title' => 'Функции',
            'description' => 'Создание функций, параметры, возвращаемые значения.',
            'user_id' => 2,
            'is_active' => 1
        ]);

        // ===== Юзер 3 (3 модуля) =====
        Module::create([
            'title' => 'Строки',
            'description' => 'Работа со строками, операции и функции для обработки текста.',
            'user_id' => 3,
            'is_active' => 1
        ]);

        Module::create([
            'title' => 'Файлы',
            'description' => 'Чтение и запись данных в файлы, потоковый ввод/вывод.',
            'user_id' => 3,
            'is_active' => 1
        ]);

        Module::create([
            'title' => 'Объектно-ориентированное программирование (ООП)',
            'description' => 'Классы, объекты, наследование, инкапсуляция и полиморфизм.',
            'user_id' => 3,
            'is_active' => 1
        ]);
    }
}
