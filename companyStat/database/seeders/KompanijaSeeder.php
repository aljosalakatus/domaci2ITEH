<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;


class KompanijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nizKompanija = [
            'Nordeus',
            'ASW Indzenjering',
            'Comtrade',
            'CBS',
            'Endava',
            'Microsoft',
            'Things solver',
            'Levi9'
          ];
  
          foreach ($nizKompanija as $kompanija){
              Company::create([
                  'nazivKompanije' => $kompanija
              ]);
          }
    }
}
