<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blood_types')->insert([
            'id' => 1,
            'name' => "O-",
        ]);
        DB::table('blood_types')->insert([
            'id' => 2,
            'name' =>"O+",
        ]);
        DB::table('blood_types')->insert([
            'id' => 3,
            'name' =>"B-",
        ]);
        DB::table('blood_types')->insert([
            'id' => 4,
            'name' => "B+",
        ]);
        DB::table('blood_types')->insert([
            'id' => 5,
            'name' => "A-",
        ]);
        DB::table('blood_types')->insert([
            'id' => 6,
            'name' => "A+",
        ]);
        DB::table('blood_types')->insert([
            'id' => 7,
            'name' => "AB-",
        ]);
        DB::table('blood_types')->insert([
            'id' => 8,
            'name' => "AB+",
        ]);
    }
}
