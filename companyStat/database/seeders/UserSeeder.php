<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('admin');
        $faker = \Faker\Factory::create();

        User::create([
            'name' => 'Aljosa',
            'email' => 'aljosalakatus@gmail.com',
            'password' => $password,
        ]);

        for ($i = 0; $i < 20; $i++) {

            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
    }
}
