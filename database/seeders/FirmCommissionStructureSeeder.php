<?php

namespace Database\Seeders;

use App\Models\FirmCommissionStructure;
use Illuminate\Database\Seeder;

class FirmCommissionStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FirmCommissionStructure::create([
            'firm_id' => 2,
            'image_path'=>'firms/commission1.png',
            'name'=>'Purple Trading',
            'points'=>json_encode([
                'Forex Oil, XPT, XDF, ETX, <b>6$</b> per standart lot',
                'Indices Crypto <b>Commission Fee</b>'
            ])
        ]);

        FirmCommissionStructure::create([
            'firm_id' => 2,
            'image_path'=>'firms/commission2.png',
            'name'=>'DXTrade:$3/round lot',
        ]);


        FirmCommissionStructure::create([
            'firm_id' => 2,
            'image_path'=>'firms/commission2.png',
            'name'=>'MatchTrade:$3/round lot',
        ]);
    }
}
