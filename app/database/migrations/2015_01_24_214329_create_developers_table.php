<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDevelopersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('developers', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 128)->unique();
			$table->string('contact_fname', 32);
			$table->string('contact_lname', 32);
			$table->string('contact_email', 64);
			$table->string('contact_phone', 10);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('developers');
	}

}
