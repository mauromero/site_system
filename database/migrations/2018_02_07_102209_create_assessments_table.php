<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssessmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assessments', function(Blueprint $table)
		{
			$table->increments('id')->unique('assessment_UNIQUE');
			$table->dateTime('exp_date')->nullable();
			$table->dateTime('start_date')->nullable();
			$table->string('location', 255)->nullable();
			$table->string('job_number', 45)->unique('job_number_UNIQUE')->nullable();
			$table->string('medical_facility_name',65)->nullable();
			$table->string('medical_facility_location',255)->nullable();
			$table->string('emergency_phone', 45)->nullable();
			$table->string('gps_n', 45)->nullable();
			$table->string('gps_w', 45)->nullable();
			$table->integer('customer_id')->index('fk_assessment_customers_idx')->nullable();
			$table->string('usa_ticket', 45)->nullable();
			$table->string('usa_marked', 45)->nullable();
			$table->string('kit_location', 500)->nullable();
			$table->string('water_sources', 500)->nullable();
			$table->string('bleed_off', 500)->nullable();
			$table->string('cutting', 500)->nullable();
			$table->string('test_hole', 500)->nullable();
			$table->string('image_name', 45)->nullable();
			$table->integer('progress')->default(0)->nullable();
			$table->boolean('submitted')->default(false)->nullable();
			$table->integer('user_id')->index('fk_assessment_user_idx');
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
		Schema::drop('assessments');
	}

}
