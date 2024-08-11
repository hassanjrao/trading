<?php

namespace Database\Seeders;

use App\Models\TradingExperience;
use Illuminate\Database\Seeder;

class TradingExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TradingExperience::create([
            'experience'=>'0-6 months'
        ]);


        TradingExperience::create([
            'experience'=>'6 months - 1 year'
        ]);
        TradingExperience::create([
            'experience'=>'1 year - 2 years'
        ]);
        TradingExperience::create([
            'experience'=>'2 years - 5 years'
        ]);
        TradingExperience::create([
            'experience'=>'5 years+'
        ]);
    }
}
