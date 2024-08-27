<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::create([
            'logo_path'=>'firms/payment_methods/1.png',
            'name'=>'Credit Card',
        ]);



        PaymentMethod::create([
            'logo_path'=>'firms/payment_methods/1.png',
            'name'=>'Credit Card',
        ]);


        PaymentMethod::create([
            'logo_path'=>'firms/payment_methods/2.png',
            'name'=>'Crypto',
        ]);
    }
}
