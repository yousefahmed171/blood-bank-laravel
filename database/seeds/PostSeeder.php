<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


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
            'img'           => '1605550069blood-bank.jpg',
            'content'       => 'تبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدم',
            'category_id'   => 1,
        ]);
        DB::table('posts')->insert([
            'id'            => 2,
            'title'        => "طلبات  الدم",
            'img'           => '1605550069blood-bank.jpg',
            'content'       => 'تبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدم',
            'category_id'   => 2,
        ]);
        DB::table('posts')->insert([
            'id'            => 3,
            'title'        => "اماكن الدم",
            'img'           => '1605550069blood-bank.jpg',
            'content'       => 'تبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدم',
            'category_id'   => 3,
        ]);
        DB::table('posts')->insert([
            'id'            => 4,
            'title'        => "اماكن الدم",
            'img'           => '1605550069blood-bank.jpg',
            'content'       => 'تبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدم',
            'category_id'   => 3,
        ]);
        DB::table('posts')->insert([
            'id'            => 5,
            'title'        => "اماكن الدم",
            'img'           => '1605550069blood-bank.jpg',
            'content'       => 'تبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدم',
            'category_id'   => 3,
        ]);
        DB::table('posts')->insert([
            'id'            => 6,
            'title'        => "اماكن الدم",
            'img'           => '1605550069blood-bank.jpg',
            'content'       => 'تبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدم',
            'category_id'   => 3,
        ]);
        DB::table('posts')->insert([
            'id'            => 7,
            'title'        => "اماكن الدم",
            'img'           => '1605550069blood-bank.jpg',
            'content'       => 'تبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدم',
            'category_id'   => 3,
        ]);
        DB::table('posts')->insert([
            'id'            => 8,
            'title'        => "اماكن الدم",
            'img'           => '1605550069blood-bank.jpg',
            'content'       => 'تبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدم',
            'category_id'   => 3,
        ]);
        DB::table('posts')->insert([
            'id'            => 9,
            'title'        => "اماكن الدم",
            'img'           => '1605550069blood-bank.jpg',
            'content'       => 'تبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدم',
            'category_id'   => 3,
        ]);
    }
}
