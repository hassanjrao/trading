<?php

namespace Database\Seeders;

use App\Models\AccountSize;
use Illuminate\Database\Seeder;

class AccountSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $size=5;

        for($i=1; $i<=5; $i++){


            $size*=2;

            AccountSize::create([
                'size' => $size,
            ]);


        }
    }
}
