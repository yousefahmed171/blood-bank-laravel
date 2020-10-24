<?php

use Illuminate\Database\Seeder;

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
            'notification_setting_post'     => "تبرعات الدم",
            'about_app'                     => 'تبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدمتبرعات الدم',
            'phone'                         => '01010737798',
            'email'                         => 'info@bloodBank.com',
            'fs_link'                       => 'www.facebook.com',
            'ins_link'                      => 'www.instegram.com',
            'tw_link'                       => 'www.twitter.com',
            'yt_link'                       => 'www.youtube.com'
        ]);
    }
}
