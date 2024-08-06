<?php

namespace Database\Seeders;

use App\Models\Step;
use Illuminate\Database\Seeder;

class StepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Step::create([
            'step'=>'Instant'
        ]);


        Step::create([
            'step'=>'1-Step'
        ]);


        Step::create([
            'step'=>'2-Step'
        ]);
        Step::create([
            'step'=>'3-Step'
        ]);
    }
}
