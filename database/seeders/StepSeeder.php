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
            'name'=>'Instant',
            'steps'=>1
        ]);


        Step::create([
            'name'=>'1-Step',
            'steps'=>1
        ]);


        Step::create([
            'name'=>'2-Step',
            'steps'=>2
        ]);
        Step::create([
            'name'=>'3-Step',
            'steps'=>3
        ]);
    }
}
