<?php

use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'id' => 3,
            'name' => "Al Minufiyah",
            'governorate_id' => 4,
        ]);
        DB::table('cities')->insert([
            'id' => 4,
            'name' =>"Al Qahirah",
            'governorate_id' => 8,
        ]);
        DB::table('cities')->insert([
            'id' => 5,
            'name' =>"Al Qalyubiyah",
            'governorate_id' => 10,
        ]);
        DB::table('cities')->insert([
            'id' => 6,
            'name' => "Al Sharqiyah",
            'governorate_id' => 20,
        ]);
        DB::table('cities')->insert([
            'id' => 7,
            'name' => "Al Daqahliyah",
            'governorate_id' => 21,
        ]);
        DB::table('cities')->insert([
            'id' => 8,
            'name' => "Bur Sa`id",
            'governorate_id' => 23,
        ]);
        DB::table('cities')->insert([
            'id' => 9,
            'name' => "Dumyat",
            'governorate_id' => 25,
        ]);
        DB::table('cities')->insert([
            'id' => 10,
            'name' => "Matruh",
            'governorate_id' => 6,
        ]);

  
    }
}
