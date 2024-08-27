<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Platform::create([
            'logo_path'=>'firms/platform1.png',
            'name'=>'RJ Trader Pro',
        ]);


        Platform::create([
            'logo_path'=>'firms/platform1.png',
            'name'=>'Trading View',
        ]);


        Platform::create([
            'logo_path'=>'firms/platform1.png',
            'name'=>'NinjaTrader',
        ]);


        Platform::create([
            'logo_path'=>'firms/platform1.png',
            'name'=>'Tradovate',
        ]);


        Platform::create([
            'logo_path'=>'firms/platform2.png',
            'name'=>'DXTrade',
        ]);


        Platform::create([
            'logo_path'=>'firms/platform2.png',
            'name'=>'cTrader',
        ]);
        Platform::create([
            'logo_path'=>'firms/platform2.png',
            'name'=>'Match Trader',
        ]);
        Platform::create([
            'logo_path'=>'firms/platform2.png',
            'name'=>'MT5',
        ]);
    }
}
