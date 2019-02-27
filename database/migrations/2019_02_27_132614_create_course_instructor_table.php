<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseInstructorTable extends Migration
{
    public function up()
    {
        Schema::create('course_instructor', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('course_id')->unsigned();
            $table->integer('instructor_id')->unsigned();

            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('instructor_id')->references('id')->on('instructors');
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_instructor');
    }
}
