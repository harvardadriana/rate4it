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
            $table->float('overall_rating', 2, 1);
            $table->mediumInteger('take_course_again');
            $table->float('difficulty', 2, 1);
            $table->float('clear_objectives', 2, 1);
            $table->float('organized', 2, 1);
            $table->float('gain_deeper_insight', 2, 1);
            $table->float('workload', 2, 1);
            $table->float('clear_assignment_instructions', 2, 1);
            $table->float('grading', 2, 1);
            $table->float('material', 2, 1);
            $table->float('clarity', 2, 1);
            $table->float('knowledge', 2, 1);
            $table->float('feedback', 2, 1);
            $table->float('performance', 2, 1);
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
