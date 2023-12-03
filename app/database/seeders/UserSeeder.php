<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Администратор',
                'email' => 'admin1@e-mail.ru',
                'password' => Hash::make('admin')
            ],
            [
                'name' => 'Пользователь',
                'email' => 'user@e-mail.ru',
                'password' => Hash::make('user')
            ]
        ]);
    }
}
