<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->tinyInteger('overall_rating');
            $table->mediumInteger('take_course_again');
            $table->char('attendance_mandatory', 3);
            $table->char('class_taken_for_credit', 3);
            $table->tinyInteger('difficulty');
            $table->tinyInteger('clear_objectives');
            $table->tinyInteger('organized');
            $table->tinyInteger('gain_deeper_insight');
            $table->tinyInteger('workload');
            $table->tinyInteger('helpful_assignments');
            $table->tinyInteger('clear_assignment_instructions');
            $table->tinyInteger('grading');
            $table->tinyInteger('material');
            $table->tinyInteger('clarity');
            $table->tinyInteger('knowledge');
            $table->tinyInteger('feedback');
            $table->tinyInteger('helpfulness_TA');
            $table->tinyInteger('performance');
            $table->tinyInteger('attendance');
            $table->smallInteger('hours_studying');
            $table->char('grade', 3);
            $table->string('survival_tips', 150);
            $table->string('comments', 300);
            $table->tinyInteger('review_helpful')->nullable();
            $table->tinyInteger('report_button')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
