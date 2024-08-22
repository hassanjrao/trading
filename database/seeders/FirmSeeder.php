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
        // Firm::create([
        //     'name'=>'Phoenix Trader Funding',
        //     'logo_path'=>'firms/phoenix-trader-funding.png',
        //     'url'=>'https://phoenixtraderfunding.com/',
        //     'established_date'=>'2020-08-06',
        //     'asset_type_id'=>1,
        //     'profit_split'=>'80% to 90%',
        //     'technology_id'=>1,
        //     'direct_path_to_live_funded'=>true,
        //     'payout_frequency'=>'Every 10 trading days',
        //     'account_size_id'=>1,
        //     'step_id'=>1,
        //     'rewards'=>'5 Points',
        //     'country_id'=>1
        // ]);


        Firm::create([
            'name'=>'MyFundedFX',
            'logo_path'=>'firms/phoenix-trader-funding.png',
            'url'=>'https://myfundedfx.com',
            'established_date'=>'2020-08-06',
            'asset_type_id'=>2,
            'profit_split'=>'80%',
            'technology_id'=>2,
            'direct_path_to_live_funded'=>false,
            'payout_frequency'=>'Any Time',
            'payout_frequency_note'=>'With 50% consistency rule',
            'account_size_id'=>2,
            'step_id'=>2,
            'rewards'=>'5 Points',
            'daily_drawdown'=>'Balanced-Based',
            'country_id'=>1
        ]);
    }
}
