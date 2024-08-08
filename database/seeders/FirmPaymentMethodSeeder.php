<?php

namespace Database\Seeders;

use App\Models\FirmPaymentMethod;
use App\Models\FirmPayoutMethod;
use Illuminate\Database\Seeder;

class FirmPaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FirmPaymentMethod::create([
            'firm_id' => 1,
            'image_path'=>'firms/payment_methods/1.png',
            'name'=>'Credit Card',
        ]);



        FirmPaymentMethod::create([
            'firm_id' => 2,
            'image_path'=>'firms/payment_methods/1.png',
            'name'=>'Credit Card',
        ]);


        FirmPaymentMethod::create([
            'firm_id' => 2,
            'image_path'=>'firms/payment_methods/2.png',
            'name'=>'Crypto',
        ]);
    }
}
