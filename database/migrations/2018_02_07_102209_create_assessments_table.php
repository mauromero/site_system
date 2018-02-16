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
			$table->integer('id')->unsigned()->unique('assessment_UNIQUE');
			$table->dateTime('exp_date')->nullable();
			$table->dateTime('start_date')->nullable();
			$table->dateTime('date')->nullable();
			$table->string('location', 45)->nullable();
			$table->string('gps_n', 45)->nullable();
			$table->string('job_number', 45)->unique('job_number_UNIQUE');
			$table->string('nearest_medical_facility', 45)->nullable();
			$table->string('agency_phone', 45)->nullable();
			$table->string('water_sources', 45)->nullable();
			$table->string('gps_w', 45)->nullable();
			$table->integer('customer_id')->index('fk_assessment_customers_idx');
			$table->string('usa_ticket', 45)->nullable();
			$table->string('usa_marked', 45)->nullable();
			$table->integer('kit_location_id')->index('fk_assessment_kit_location1_idx');
			$table->boolean('h_underground')->nullable();
			$table->boolean('h_overhead')->nullable();
			$table->boolean('h_weather')->nullable();
			$table->boolean('h_traffic')->nullable();
			$table->boolean('h_fire')->nullable();
			$table->boolean('h_confspace')->nullable();
			$table->boolean('h_electrical')->nullable();
			$table->boolean('h_equip')->nullable();
			$table->boolean('h_chemical')->nullable();
			$table->boolean('h_sound')->nullable();
			$table->boolean('h_rigging&hoist')->nullable();
			$table->boolean('h_environmental')->nullable();
			$table->boolean('h_ppe')->nullable();
			$table->boolean('h_uneven_gr')->nullable();
			$table->boolean('h_pedestrian')->nullable();
			$table->boolean('h_health')->nullable();
			$table->boolean('h_air_quality')->nullable();
			$table->boolean('h_trenches')->nullable();
			$table->boolean('h_water')->nullable();
			$table->boolean('h_animal')->nullable();
			$table->boolean('h_trucking')->nullable();
			$table->boolean('h_ladder')->nullable();
			$table->boolean('h_tanks')->nullable();
			$table->boolean('h_light')->nullable();
			$table->boolean('h_fall')->nullable();
			$table->boolean('h_airborne')->nullable();
			$table->boolean('h_pressure')->nullable();
			$table->boolean('h_tripping')->nullable();
			$table->boolean('h_pinch_points')->nullable();
			$table->boolean('h_employee')->nullable();
			$table->boolean('h_permits')->nullable();
			$table->boolean('completed')->default(false);
			$table->integer('facility_id')->index('fk_assessment_facilities1_idx');
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
