<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->enum('day', ['M', 'T', 'W', 'R', 'F']);
            $table->time('start_time');
            $table->time('end_time');
            $table->string('type');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('schedule_type');

            $table->unsignedInteger('course_id')->index();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings');
    }
}
