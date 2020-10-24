<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //title 	img 	content 	category_id

        DB::table('posts')->insert([
            'id'            => 1,
            'title'        => "تبرعات الدم",
            'img'           => 'img',
            'content'       => 'تبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدم',
            'category_id'   => 1,
        ]);
        DB::table('posts')->insert([
            'id'            => 2,
            'title'        => "طلبات  الدم",
            'img'           => 'img',
            'content'       => 'تبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدم',
            'category_id'   => 2,
        ]);
        DB::table('posts')->insert([
            'id'            => 3,
            'title'        => "اماكن الدم",
            'img'           => 'img',
            'content'       => 'تبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدم',
            'category_id'   => 3,
        ]);
    }
}
