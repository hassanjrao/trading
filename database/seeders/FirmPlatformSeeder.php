<?php

namespace Database\Seeders;

use App\Models\FirmPlatform;
use Illuminate\Database\Seeder;

class FirmPlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FirmPlatform::create([
            'firm_id' => 1,
            'image_path'=>'firms/platform1.png',
            'name'=>'RJ Trader Pro',
        ]);


        FirmPlatform::create([
            'firm_id' => 1,
            'image_path'=>'firms/platform1.png',
            'name'=>'Trading View',
        ]);


        FirmPlatform::create([
            'firm_id' => 1,
            'image_path'=>'firms/platform1.png',
            'name'=>'NinjaTrader',
        ]);


        FirmPlatform::create([
            'firm_id' => 1,
            'image_path'=>'firms/platform1.png',
            'name'=>'Tradovate',
        ]);


        FirmPlatform::create([
            'firm_id' => 2,
            'image_path'=>'firms/platform2.png',
            'name'=>'DXTrade',
        ]);


        FirmPlatform::create([
            'firm_id' => 2,
            'image_path'=>'firms/platform2.png',
            'name'=>'cTrader',
        ]);
        FirmPlatform::create([
            'firm_id' => 2,
            'image_path'=>'firms/platform2.png',
            'name'=>'Match Trader',
        ]);
        FirmPlatform::create([
            'firm_id' => 2,
            'image_path'=>'firms/platform2.png',
            'name'=>'MT5',
        ]);
    }
}
