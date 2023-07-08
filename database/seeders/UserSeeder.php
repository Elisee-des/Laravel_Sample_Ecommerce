<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Sarah',
            'email' => 'sara@gmail.com',
            'password' => bcrypt('user')
        ]);

        User::create([
            'name' => 'Paulin',
            'email' => 'paulin@gmail.com',
            'password' => bcrypt('user')
        ]);

        User::create([
            'name' => 'Jean',
            'email' => 'jean@gmail.com',
            'password' => bcrypt('user')
        ]);

        User::create([
            'name' => 'ali',
            'email' => 'ali@gmail.com',
            'password' => bcrypt('user')
        ]);

        User::create([
            'name' => 'Boni',
            'email' => 'boni@gmail.com',
            'password' => bcrypt('user')
        ]);

        User::create([
            'name' => 'Arlette',
            'email' => 'arlette@gmail.com',
            'password' => bcrypt('user')
        ]);

        User::create([
            'name' => 'Hachile',
            'email' => 'hachil@gmail.com',
            'password' => bcrypt('user')
        ]);

        User::create([
            'name' => 'Alex',
            'email' => 'alex@gmail.com',
            'password' => bcrypt('user')
        ]);

        User::create([
            'name' => 'Felicite',
            'email' => 'felicite@gmail.com',
            'password' => bcrypt('user')
        ]);

        User::create([
            'name' => 'Antoine',
            'email' => 'antoine@gmail.com',
            'password' => bcrypt('user')
        ]);
    }
}
