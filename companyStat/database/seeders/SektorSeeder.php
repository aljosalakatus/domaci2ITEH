<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sektor;

class SektorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sektori = [
            'Finansije',
            'Marketing',
            'Front',
            'Back',
            'Data science',
            'Ljudski resursi'
        ];

        foreach ($sektori as $sektor){
            Sektor::create([
                'nazivSektora' => $sektor
            ]);
        }
    }
}
