<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTokensTable extends Migration {

	public function up()
	{
		Schema::create('tokens', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('token');
			$table->enum('type', ["android", "ios"]);
			$table->integer('client_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('tokens');
	}
}