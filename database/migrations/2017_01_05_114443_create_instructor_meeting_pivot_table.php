<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorMeetingPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructor_meeting', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedInteger('instructor_id')->index();
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');

            $table->unsignedInteger('meeting_id')->index();
            $table->foreign('meeting_id')->references('id')->on('meetings')->onDelete('cascade');

            $table->primary(['instructor_id', 'meeting_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('instructor_meeting');
    }
}