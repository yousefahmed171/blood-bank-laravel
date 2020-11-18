<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('notification_setting_post');
			$table->text('about_app');
			$table->text('about');
			$table->string('phone');
			$table->string('email');
			$table->string('facebook_link');
			$table->string('instagram_link');
			$table->string('twitter_link');
			$table->string('youtube_link');
			$table->string('whatsapp_link');
			$table->string('android_link');
			$table->string('ios_link');

		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}