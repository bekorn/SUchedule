<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolyScheduleCoursePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poly_has_mono', function (Blueprint $table) {
            $table->unsignedInteger('poly_schedule_id')->index();
            $table->foreign('poly_schedule_id')->references('id')->on('poly_schedules')->onDelete('cascade');

            $table->unsignedInteger('mono_schedule_id')->index();
            $table->foreign('mono_schedule_id')->references('id')->on('mono_schedules')->onDelete('cascade');

            $table->primary(['poly_schedule_id', 'mono_schedule_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('poly_has_mono');
    }
}
