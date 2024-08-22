<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=User::firstOrCreate([
            'email'=>'admin@m.com'
        ],[
            'name'=>'Admin',
            'password'=>bcrypt('12345678'),
            'email_verified_at'=>now(),
            'email'=>'admin@m.com'
        ]);

        $admin->assignRole('admin');
    }
}
