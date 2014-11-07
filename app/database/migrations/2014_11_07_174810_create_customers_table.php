<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// creates schema
		Schema::create('customers', function($table) {
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email')->unique(); // makes this field unique
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
		// deletes schema
		Schema::drop('customers');
	}

}
