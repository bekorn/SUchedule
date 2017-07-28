<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->text('body');
            $table->unsignedTinyInteger('course_rating');
            $table->unsignedTinyInteger('instructor_rating');
            $table->timestamps();

            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedInteger('instructor_id')->index();
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');

            $table->unsignedInteger('course_id')->index();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

            $table->unique(['user_id', 'instructor_id', 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
