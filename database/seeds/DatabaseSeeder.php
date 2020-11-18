<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            
            GovernorateSeeder::class,
            CitiesSeeder::class,
            BloodTypeSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            SettingSeeder::class,
            ClientSedder::class
            
        ]);
         
    }
}
