<?php

use Illuminate\Database\Seeder;

class ClientSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'id'                    => 1,
            'name'                  => "Yousef",
            'email'                 => "yousefahmed171@gmail.com",
            'password'              => bcrypt('123'),
            'phone'                 => "01010737793",
            'brith_date'            => "2020-6-6",
            'last_donation_date'    => "2020-1-1",
            'city_id'               => "1",
            'blood_type_id'         => "1",
            'api_token'             => "yC75PGjMJxrr5umSOvycjyYWb02bY2AtoOq0iVbRelaQwKCdkWUVH80k5Mva"
            
        ]);

        DB::table('clients')->insert([
            'id'                    => 2,
            'name'                  => "Ahmed",
            'email'                 => "ahmedyousef2520@gmail.com",
            'password'              => bcrypt('123'),
            'phone'                 => "0566366110",
            'brith_date'            => "2020-6-6",
            'last_donation_date'    => "2020-1-1",
            'city_id'               => "1",
            'blood_type_id'         => "1",
            'api_token'             => "20cKP97nJfOW9sQG27sreyVBOk5psk3snmiKN8ImMXIT3O1YqVdmfAdEkEBn"

        ]);

    }
}
