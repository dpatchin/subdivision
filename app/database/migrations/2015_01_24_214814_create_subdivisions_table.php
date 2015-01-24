<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubdivisionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subdivisions', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('developer_id');
			$table->string('name', 64);
			$table->string('address', 64);
			$table->string('city', 64);
			$table->string('state', 16);
			$table->string('zip', 10);
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
		Schema::drop('subdivisions');
	}

}
