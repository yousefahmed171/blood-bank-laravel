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
            'id' => 1,
            'name' => "العاشر من رمضان ",
            'governorate_id' => 1,
        ]);
        DB::table('cities')->insert([
            'id' => 2,
            'name' => "مدينة نصر ",
            'governorate_id' => 2,
        ]);
        DB::table('cities')->insert([
            'id' => 3,
            'name' => "المنصورة",
            'governorate_id' => 3,
        ]);
        DB::table('cities')->insert([
            'id' => 4,
            'name' => "العبور",
            'governorate_id' => 4,
        ]);
        DB::table('cities')->insert([
            'id' => 5,
            'name' => "قويسنا",
            'governorate_id' => 5,
        ]);

  
    }
}
