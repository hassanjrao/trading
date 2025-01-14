<?php

namespace Database\Seeders;

use App\Models\Firm;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            CountrySeeder::class,
            AccountSizeSeeder::class,
            AssetTypeSeeder::class,
            StepSeeder::class,
            TechnologySeeder::class,
            FirmSeeder::class,
            FirmChallengeSeeder::class,
            FrimAboutSeeder::class,
            FirmCommissionStructureSeeder::class,
            RoleSeeder::class,
            TradingExperienceSeeder::class,
            PropFirmChallengeSeeder::class,
            UserSeeder::class,
            PlatformSeeder::class,
            PaymentMethodSeeder::class,
            PayoutMethodSeeder::class,
            OfferSeeder::class,
        ]);
    }
}
