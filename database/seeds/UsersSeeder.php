<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'id'                    => 1,
            'name'                  => "Suber Admin",
            'email'                 => "suberadmin@bloodbank.com",
            'password'              => bcrypt('123')
        ]);

        DB::table('users')->insert([
            'id'                    => 2,
            'name'                  => "Admin",
            'email'                 => "admin@bloodbank.com",
            'password'              => bcrypt('123')
        ]);

        DB::table('users')->insert([
            'id'                    => 3,
            'name'                  => "Creators",
            'email'                 => "creators@bloodbank.com",
            'password'              => bcrypt('123')
        ]);


    }
}