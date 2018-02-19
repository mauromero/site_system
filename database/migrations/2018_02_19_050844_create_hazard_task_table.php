<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHazardTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hazard_task', function (Blueprint $table) {
            $table->increments('id')->unique('hazard_task_UNIQUE');
            $table->integer('task_id');
            $table->integer('hazard_id');
            $table->string('hazard', 500)->nullable();
            $table->string('measure', 500)->nullable();
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
        Schema::dropIfExists('hazard_task');
    }
}
