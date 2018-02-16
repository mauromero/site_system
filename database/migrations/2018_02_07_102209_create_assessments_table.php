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
			$table->dateTime('date')->nullable();
			$table->string('location', 45)->nullable();
			$table->string('job_number', 45)->unique('job_number_UNIQUE');
			$table->string('nearest_medical_facility', 45)->nullable();
			$table->string('emergency_phone', 45)->nullable();
			$table->string('water_sources', 45)->nullable();
			$table->string('gps_n', 45)->nullable();
			$table->string('gps_w', 45)->nullable();
			$table->integer('customer_id')->index('fk_assessment_customers_idx');
			$table->string('usa_ticket', 45)->nullable();
			$table->string('usa_marked', 45)->nullable();
			$table->integer('kit_location_id')->index('fk_assessment_kit_location1_idx');
			$table->integer('progress')->default(0);
			$table->boolean('submitted')->default(false);
			$table->integer('med_facility_id')->index('fk_assessment_facilities1_idx');
			$table->integer('user_id')->index('fk_assessment_user1_idx');
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
