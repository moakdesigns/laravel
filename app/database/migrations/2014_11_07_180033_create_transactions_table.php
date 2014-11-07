<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// creates schema
		Schema::create('transactions', function ($table) {
			$table->increments('id');
			$table->string('name');
			$table->float('amount');
			$table->integer('customer_id');
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
		Schema::drop('transactions');
	}

}
