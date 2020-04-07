<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addresses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('address_line_one');
			$table->string('address_line_two')->nullable();
			$table->string('address_line_three')->nullable();
			$table->string('county', 45);
			$table->string('postcode', 45);
			$table->string('city', 45);
			$table->string('country')->nullable();
			$table->dateTime('created_at')->nullable();
			$table->string('updated_at', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('addresses');
	}

}
