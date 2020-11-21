<?php

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
        $this->call([
            
            GovernorateSeeder::class,
            CitiesSeeder::class,
            BloodTypeSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            SettingSeeder::class,
            ClientSedder::class,
            PermissionsSeeder::class,
            RolesSeeder::class,
            UsersSeeder::class,

            
        ]);
         
    }
}
