<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 50);
			$table->string('last_name', 45)->nullable();
			$table->string('phone', 45)->nullable();
			$table->string('cellphone', 45)->nullable();
			$table->string('email', 50)->nullable();
			$table->string('address', 255)->nullable();
			$table->string('company', 50)->nullable();
			$table->string('notes', 1024)->nullable();
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
		Schema::drop('customers');
	}

}
