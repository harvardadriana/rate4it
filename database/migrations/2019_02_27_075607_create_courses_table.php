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
            $table->increments('id');
            $table->timestamps();
            $table->string('title_for_sort', 170);
            $table->string('title', 170);
            $table->string('title_for_url', 180);
            $table->string('subject_and_course_code', 12);
            $table->string('code', 5);
            $table->mediumInteger('code_int');
            $table->mediumInteger('hes_id');
            $table->string('crn', 5);
            $table->mediumInteger('crn_as_int');
            $table->string('college_code', 2);
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
