<?php

namespace Database\Seeders;

use App\Models\PayoutMethod;
use Illuminate\Database\Seeder;

class PayoutMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        PayoutMethod::create([
            'logo_path'=>'firms/payment_methods/1.png',
            'name'=>'Credit Card',
        ]);



        PayoutMethod::create([
            'logo_path'=>'firms/payment_methods/1.png',
            'name'=>'Credit Card',
        ]);


        PayoutMethod::create([
            'logo_path'=>'firms/payment_methods/2.png',
            'name'=>'Crypto',
        ]);
    }
}
