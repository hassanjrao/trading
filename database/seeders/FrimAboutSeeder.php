<?php

namespace Database\Seeders;

use App\Models\FirmAbout;
use Illuminate\Database\Seeder;

class FrimAboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FirmAbout::create([
            'firm_id'=>1,
            'chief_executive_officer'=>'John Doe',
            'trust_pilot'=>'4.3',
            'more_than_5_platforms'=>false,
            'commission_strucuture_link'=>'https://phoenixtraderfunding.com/commission-structure/',
            'description'=>'Phoenix Trader Funding is a proprietary trading firm that provides the opportunity for traders to trade the firm’s capital. The firm was founded by a team of experienced traders and financial professionals who have a combined experience of over 30 years in the industry. Phoenix Trader Funding offers traders the opportunity to trade a variety of asset classes including forex, stocks, commodities, and cryptocurrencies. The firm provides traders with a competitive profit split, access to cutting-edge trading technology, and a direct path to live funded accounts. Phoenix Trader Funding also offers traders the opportunity to earn rewards based on their trading performance.'
        ]);


        FirmAbout::create([
            'firm_id'=>2,
            'chief_executive_officer'=>'Matt Doe',
            'trust_pilot'=>'4.3',
            'more_than_5_platforms'=>true,
            'commission_strucuture_link'=>'https://myfundedfx.com/commission-structure/',
            'description'=>'Description for MyFundedFX Description for MyFundedFXDescription for MyFundedFXDescription for MyFundedFXDescription for MyFundedFXDescription for MyFundedFX'
        ]);

    }
}
