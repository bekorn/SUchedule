<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonoScheduleCoursePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mono_has_courses', function (Blueprint $table) {
            $table->unsignedInteger('mono_schedule_id')->index();
            $table->foreign('mono_schedule_id')->references('id')->on('mono_schedules')->onDelete('cascade');

            $table->unsignedInteger('course_id')->index();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

            $table->primary(['mono_schedule_id', 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mono_has_courses');
    }
}
