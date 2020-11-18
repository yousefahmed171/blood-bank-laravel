<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


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
            'name' => "الشرقية",
        ]);
        DB::table('governorates')->insert([
            'id' => 2,
            'name' => "القاهرة",
        ]);
        DB::table('governorates')->insert([
            'id' => 3,
            'name' => "الدقهلية",
        ]);
        DB::table('governorates')->insert([
            'id' => 4,
            'name' =>"القليوبية",
        ]);
        DB::table('governorates')->insert([
            'id' => 5,
            'name' =>"المنوفية",
        ]);
  
    }
}


