<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->integer('age');
			$table->integer('blood_type_id')->unsigned();
			$table->integer('bags');
			$table->string('hospital_name');
			$table->text('hospital_address');
			$table->integer('city_id')->unsigned();
			$table->string('phone');
			$table->text('details');
			$table->double('latitude')->nullable();
			$table->double('longitude')->nullable();
			$table->integer('client_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}