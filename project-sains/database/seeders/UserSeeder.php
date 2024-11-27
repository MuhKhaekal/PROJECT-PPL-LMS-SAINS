<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = 
        [
            [
                'name' => 'Muhammad Khaekal',
                'email' => 'muh.khaekal@gmail.com',
                'nim' => 'H071221039',
                'role' => 'admin',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Muh.Ilham Maulana Ramlan',
                'email' => 'muh.ilham@gmail.com',
                'nim' => 'H071221035',
                'role' => 'asisten',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Muhammad Reza',
                'email' => 'muh.reza@gmail.com',
                'nim' => 'H071221037',
                'role' => 'user',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Muhammad Iqbal',
                'email' => 'muh.iqbal@gmail.com',
                'nim' => 'H071221087',
                'role' => 'user',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Muhammad Taufan Sandi',
                'email' => 'muh.taufan@gmail.com',
                'nim' => 'H071221029',
                'role' => 'user',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Raehan Ramadhan Hamzah',
                'email' => 'raehanram@gmail.com',
                'nim' => 'H071221005',
                'role' => 'user',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Muhammad Nabil Shadiq',
                'email' => 'muh.nabil@gmail.com',
                'nim' => 'H071221083',
                'role' => 'user',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Muhammad Zoel Ramadhan ',
                'email' => 'muh.zoel@gmail.com',
                'nim' => 'H071221059',
                'role' => 'user',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Surya Agus Nanro',
                'email' => 'suryaagus@gmail.com',
                'nim' => 'H071221038',
                'role' => 'user',
                'password' => bcrypt('12345678'),
            ]
        ];
        foreach($users as $user) {
        User::create($user);
        }
    }
}
