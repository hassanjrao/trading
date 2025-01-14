<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Offer::create([
            'firm_id' => 1,
            'description' => 'Get 10% off on all services',
            'promo_code' => 'WELCOME10'
        ]);

        Offer::create([
            'firm_id' => 1,
            'description' => 'Get 20% off on all services',
            'promo_code' => 'WELCOME20'
        ]);

        Offer::create([
            'firm_id' => 1,
            'description' => 'Get 30% off on all services',
            'promo_code' => 'WELCOME30'
        ]);

        Offer::create([
            'firm_id' => 1,
            'description' => 'Get 10% off on all services',
            'promo_code' => 'WELCOME10'
        ]);

        Offer::create([
            'firm_id' => 1,
            'description' => 'Get 20% off on all services',
            'promo_code' => 'WELCOME20'
        ]);

        Offer::create([
            'firm_id' => 1,
            'description' => 'Get 30% off on all services',
            'promo_code' => 'WELCOME30'
        ]);
    }
}
