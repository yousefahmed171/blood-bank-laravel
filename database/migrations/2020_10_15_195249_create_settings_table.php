<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('notification_setting_post');
			$table->text('about_app');
			$table->string('phone');
			$table->string('email');
			$table->string('fs_link');
			$table->string('ins_link');
			$table->string('tw_link');
			$table->string('yt_link');
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}