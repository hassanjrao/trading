<?php

namespace Database\Seeders;

use App\Models\PropFirmChallenge;
use Illuminate\Database\Seeder;

class PropFirmChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PropFirmChallenge::create([
            'challenge'=>'Never'
        ]);


        PropFirmChallenge::create([
            'challenge'=>'1'
        ]);
        PropFirmChallenge::create([
            'challenge'=>'1-5'
        ]);
        PropFirmChallenge::create([
            'challenge'=>'5+'
        ]);
    }
}
