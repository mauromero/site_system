<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToHazardTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hazard_task', function(Blueprint $table)
		{
			$table->foreign('task_id', 'fk_task_hazard_task')->references('id')->on('tasks')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hazard_task', function(Blueprint $table)
		{
			$table->dropForeign('fk_task_hazard_task');
		});
    }
}
