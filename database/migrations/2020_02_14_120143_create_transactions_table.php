<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('status_id')->unsigned()->index('transactions_status_fk_idx');
			$table->integer('user_id')->unsigned();
			$table->string('name', 65);
			$table->integer('total');
			$table->integer('fee');
			$table->integer('net_amount');
			$table->string('transaction_reference_id')->nullable();
			$table->string('provider_user_id', 45)->nullable();
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
		Schema::drop('transactions');
	}

}
