<?php

namespace Database\Seeders;

use App\Models\Firm;
use Illuminate\Database\Seeder;

class FirmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Firm::create([
            'name'=>'Phoenix Trader Funding',
            'logo_path'=>'firms/phoenix-trader-funding.png',
            'url'=>'https://phoenixtraderfunding.com/',
            'established_date'=>'2020-08-06',
            'asset_type_id'=>1,
            'profit_split'=>'80% to 90%',
            'technology_id'=>1,
            'direct_path_to_live_funded'=>true,
            'payout_frequency'=>'Every 10 trading days',
            'account_size_id'=>1,
            'step_id'=>1,
            'rewards'=>'5 Points'
        ]);
    }
}
