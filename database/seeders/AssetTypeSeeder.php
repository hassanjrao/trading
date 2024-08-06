<?php

namespace Database\Seeders;

use App\Models\AssetType;
use Illuminate\Database\Seeder;

class AssetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AssetType::create([
            'name'=>'Futures'
        ]);

        AssetType::create([
            'name'=>'CFD'
        ]);

        AssetType::create([
            'name'=>'Stocks'
        ]);


        AssetType::create([
            'name'=>'Crypto'
        ]);
    }
}
