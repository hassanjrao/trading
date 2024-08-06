<?php

namespace Database\Seeders;

use App\Models\FirmChallenge;
use Illuminate\Database\Seeder;

class FirmChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<50; $i++){
            FirmChallenge::create([
                'firm_id'=>1,
                'actual_price'=>rand(100, 1000),
                'actual_price_note'=>'MONTHLY',
                'before_price'=>rand(100, 500),
                'account_size_id'=>rand(1, 5),
                'step_id'=>rand(1, 4),
                'profit_target'=>rand(1000, 10000),
                'max_daily_loss'=>rand(1000, 5000),
                'max_daily_loss_note'=>NULL,
                'max_total_drawdown'=>rand(1000, 5000),
                'profit_split'=>'80% to 90%',
                'activation_fee'=>rand(100, 500),
                'rewards'=>'5 Points',
            ]);
        }


        for($i=0; $i<40; $i++){
            FirmChallenge::create([
                'firm_id'=>2,
                'actual_price'=>rand(100, 1000),
                'actual_price_note'=>'MONTHLY',
                'before_price'=>rand(100, 500),
                'account_size_id'=>rand(1, 5),
                'step_id'=>rand(1, 4),
                'profit_target'=>rand(1000, 10000),
                'max_daily_loss'=>rand(1000, 5000),
                'max_daily_loss_note'=>'Daily Pause',
                'max_total_drawdown'=>rand(1000, 5000),
                'profit_split'=>'80% to 90%',
                'activation_fee'=>rand(100, 500),
                'rewards'=>'5 Points',
            ]);
        }
    }
}
