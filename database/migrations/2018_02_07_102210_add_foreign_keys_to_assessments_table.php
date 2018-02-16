<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAssessmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('assessments', function(Blueprint $table)
		{
			$table->foreign('customer_id', 'fk_assessment_customer')->references('id')->on('customers')->onUpdate('NO ACTION')->onDelete('RESTRICT');
			$table->foreign('facility_id', 'fk_assessment_facilitiy1')->references('id')->on('facilities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('kit_location_id', 'fk_assessment_kit_location1')->references('id')->on('kit_locations')->onUpdate('NO ACTION')->onDelete('RESTRICT');
			$table->foreign('user_id', 'fk_assessment_user1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('assessments', function(Blueprint $table)
		{
			$table->dropForeign('fk_assessment_customer');
			$table->dropForeign('fk_assessment_facilitiy1');
			$table->dropForeign('fk_assessment_kit_location1');
			$table->dropForeign('fk_assessment_user1');
		});
	}

}
