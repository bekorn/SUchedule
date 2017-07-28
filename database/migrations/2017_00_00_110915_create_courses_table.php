<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->unsignedInteger('cdn');
            $table->string('term');
            $table->string('code');
            $table->string('title');
            $table->string('section');
            $table->string('type');
            $table->string('faculty');
            $table->unsignedTinyInteger('ECTS');
            $table->unsignedTinyInteger('su_credit');
            $table->unsignedSmallInteger('capacity');
            $table->unsignedSmallInteger('remaining');
            $table->string('catalog_entry_link')->nullable();
            $table->string('detailed_information_link')->nullable();
            $table->decimal('rating', 9, 8)->nullable()->default(null);
            $table->unsignedMediumInteger('number_of_ratings')->default( 0 );

            $table->unique(['cdn', 'term']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
