<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Zaposleni;


class ZaposleniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {

            Zaposleni::create([
                'ime' => $faker->firstName,
                'prezime' => $faker->lastName,
                'godinaRodjenja' => rand(1970,2003),
                'kompanijaID' => rand(1,8),
                'sektorID' => rand(1,6),
            ]);
        }
    }
}
