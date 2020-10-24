<?php

use Illuminate\Database\Seeder;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('governorates')->insert([
            'id' => 1,
            'name' => "Al Gharbiyah",
        ]);
        DB::table('governorates')->insert([
            'id' => 2,
            'name' => "Al Isma`iliyah",
        ]);
        DB::table('governorates')->insert([
            'id' => 3,
            'name' => "Al Minufiyah",
        ]);
        DB::table('governorates')->insert([
            'id' => 4,
            'name' =>"Al Qahirah",
        ]);
        DB::table('governorates')->insert([
            'id' => 5,
            'name' =>"Al Qalyubiyah",
        ]);
        DB::table('governorates')->insert([
            'id' => 6,
            'name' => "Al Sharqiyah",
        ]);
        DB::table('governorates')->insert([
            'id' => 7,
            'name' => "Al Daqahliyah",
        ]);
        DB::table('governorates')->insert([
            'id' => 8,
            'name' => "Bur Sa`id",
        ]);
        DB::table('governorates')->insert([
            'id' => 9,
            'name' => "Dumyat",
        ]);
        DB::table('governorates')->insert([
            'id' => 10,
            'name' => "Matruh",
        ]);
        DB::table('governorates')->insert([
            'id' => 11,
            'name' => "Al Buhayrah",
        ]);
        DB::table('governorates')->insert([
            'id' => 12,
            'name' => "Al Fayyum",
        ]);
        DB::table('governorates')->insert([
            'id' => 13,
            'name' => "Al Iskandariyah",
        ]);
        DB::table('governorates')->insert([
            'id' => 14,
            'name' => "Al Jizah",
        ]);
        DB::table('governorates')->insert([
            'id' => 15,
            'name' => "Al Minya",
        ]);
        DB::table('governorates')->insert([
            'id' => 16,
            'name' => "Bani Suwayf",
        ]);
        DB::table('governorates')->insert([
            'id' => 17,
            'name' => "Kafr ash Shaykh",
        ]);
        DB::table('governorates')->insert([
            'id' => 18,
            'name' => "Aswan",
        ]);
        DB::table('governorates')->insert([
            'id' => 19,
            'name' => "Asyut",
        ]);
        DB::table('governorates')->insert([
            'id' => 20,
            'name' => "Al Wadi at Jadid",
        ]);
        DB::table('governorates')->insert([
            'id' => 21,
            'name' => "Qina",
        ]);
        DB::table('governorates')->insert([
            'id' => 22,
            'name' => "Suhaj",
        ]);
        DB::table('governorates')->insert([
            'id' => 23,
            'name' => "Suways",
        ]);
        DB::table('governorates')->insert([
            'id' => 24,
            'name' => "Al Bahr al Ahmar",
        ]);
        DB::table('governorates')->insert([
            'id' => 25,
            'name' => "anub Sina",
        ]);
        DB::table('governorates')->insert([
            'id' => 26,
            'name' => "Shamal Sina",
        ]);
        DB::table('governorates')->insert([
            'id' => 27,
            'name' => "Luxor",
        ]);
  
    }
}


