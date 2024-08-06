<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Technology::create([
            'name'=>'White-Label'
        ]);

        Technology::create([
            'name'=>'Proprietary'
        ]);
    }
}
