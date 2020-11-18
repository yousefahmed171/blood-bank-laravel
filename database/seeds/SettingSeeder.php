<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'id'                            => 1,
            'notification_setting_post'     => "بنك الدم أو مصرف الدم أو مخزن الدم ‏ هو مخزن حفظ الدم ومكوناته، والتي يتم جمعها من المتبرعين بدمهم، إذ يتم جمع وتخزين الدم ومكوناته والحفاظ عليها لاستخدامها لاحقًا في العمليات التي تتطلب نقل الدم.",
            'about_app'                     => 'بنك الدم أو مصرف الدم أو مخزن الدم ‏ هو مخزن حفظ الدم ومكوناته، والتي يتم جمعها من المتبرعين بدمهم، إذ يتم جمع وتخزين الدم ومكوناته والحفاظ عليها لاستخدامها لاحقًا في العمليات التي تتطلب نقل الدم.',
            'about'                         => 'بنك الدم أو مصرف الدم أو مخزن الدم ‏ هو مخزن حفظ الدم ومكوناته، والتي يتم جمعها من المتبرعين بدمهم، إذ يتم جمع وتخزين الدم ومكوناته والحفاظ عليها لاستخدامها لاحقًا في العمليات التي تتطلب نقل الدم.',
            'phone'                         => '01010737793',
            'email'                         => 'info@bloodBank.com',
            'facebook_link'                 => 'https://www.facebook.com',
            'instagram_link'                => 'https://www.instegram.com',
            'twitter_link'                  => 'https://www.twitter.com',
            'youtube_link'                  => 'https://www.youtube.com',
            'whatsapp_link'                 => 'https://wa.me/message/WGE7WPX6JJBTA1',
            'android_link'                  => 'https://play.google.com/store/apps/',
            'ios_link'                      => 'https://www.apple.com/app-store/'
        ]);
    }
}
