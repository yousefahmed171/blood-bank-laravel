<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email');
			$table->string('phone');
			$table->string('password');
			$table->date('brith_date');
			$table->date('last_donation_date');
			$table->integer('city_id')->unsigned();
			$table->integer('blood_type_id')->unsigned();
			$table->boolean('active')->default(0)->nullable();
			$table->integer('pin_code')->unsigned()->nullable();
			$table->string('api_token', 60)->unique()->nullable();
			$table->rememberToken();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}