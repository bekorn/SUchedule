<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolyScheduleAppliedPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poly_schedule_applied', function (Blueprint $table) {
            $table->unsignedInteger('poly_schedule_id')->index();
            $table->foreign('poly_schedule_id')->references('id')->on('poly_schedules')->onDelete('cascade');

            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->boolean('active');

            $table->primary(['poly_schedule_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('poly_schedule_applied');
    }
}
