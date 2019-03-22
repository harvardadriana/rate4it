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
            $table->increments('id');
            $table->timestamps();

            $table->char('take_course_again', 3);           // yes or no
            $table->char('class_taken_for_credit', 3);     // yes or no
            $table->string('major', 40);
            $table->string('grade_received', 25);      // A+   have not received yet

            $table->tinyInteger('difficulty');                      // 6 levels: 0 - 5
            $table->string('quality_material', 14);         // not applicable
            $table->string('workload', 14);
            $table->string('assignments_difficulty', 14);
            $table->string('reading_load', 14);
            $table->string('projects', 14);
            $table->string('exams', 14);
            $table->string('knowledge_instructor', 14);
            $table->string('clarity_instructor', 14);
            $table->string('feedback', 14);
            $table->string('organized_course', 14);
            $table->string('survival_tips', 150);
            $table->string('comments', 300);
            $table->date('date_review');
            $table->char('review_helpful', 1);
            $table->char('report_button', 1);

            // user->id
            // course->id
            // major->id

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
