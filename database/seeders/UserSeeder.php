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
            'password' => bcrypt('user'),
            'phone' => '77520412',
            'adress' => 'Pissy rue 12',
            'profession' => 'Developpeur Mobile',
            'role' => 'role'
        ]);

        User::create([
            'name' => 'Paulin',
            'email' => 'paulin@gmail.com',
            'password' => bcrypt('user'),
            'phone' => '60520412',
            'adress' => 'Tanghin rue 12',
            'profession' => 'Developpeur IA',
        ]);

        User::create([
            'name' => 'Jean',
            'email' => 'jean@gmail.com',
            'password' => bcrypt('user'),
            'phone' => '64520412',
            'adress' => 'Tanghin rue 12',
            'profession' => 'Developpeur Electronic',
            'role' => 'user'

        ]);

        User::create([
            'name' => 'ali',
            'email' => 'ali@gmail.com',
            'password' => bcrypt('user'),
            'phone' => '78520412',
            'adress' => 'cissin rue 12',
            'profession' => 'Developpeur web',
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Boni',
            'email' => 'boni@gmail.com',
            'password' => bcrypt('user'),
            'phone' => '50520412',
            'adress' => '1200 logement rue 12',
            'profession' => 'Designeur UI/UX',
        ]);

        User::create([
            'name' => 'Arlette',
            'email' => 'arlette@gmail.com',
            'password' => bcrypt('user'),
            'phone' => '57520412',
            'adress' => 'Bonheur ville rue 12',
            'profession' => 'Bloggeur',
        ]);

        User::create([
            'name' => 'Hachile',
            'email' => 'hachil@gmail.com',
            'password' => bcrypt('user'),
            'phone' => '69520412',
            'adress' => 'Dassassogo rue 12',
            'profession' => 'Developpeur IA',
        ]);

        User::create([
            'name' => 'Alex',
            'email' => 'alex@gmail.com',
            'password' => bcrypt('user'),
            'phone' => '61520412',
            'adress' => 'Sapone rue 12',
            'profession' => 'Developpeur Web et mobile',
        ]);

        User::create([
            'name' => 'Felicite',
            'email' => 'felicite@gmail.com',
            'password' => bcrypt('user'),
            'phone' => '60520412',
            'adress' => 'Koubri rue 12',
            'profession' => 'Ingenieur Marketing',
        ]);

        User::create([
            'name' => 'Antoine',
            'email' => 'antoine@gmail.com',
            'password' => bcrypt('user'),
            'phone' => '70520412',
            'adress' => 'Kombisiri rue 12',
            'profession' => 'Developpeur IA et maching learning',
        ]);
    }
}
