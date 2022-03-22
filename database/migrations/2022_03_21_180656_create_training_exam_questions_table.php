<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingExamQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_exam_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('training_exam_id');
            $table->unsignedInteger('question_type')->nullable()->comment('1 for OX type, 2 for Multiple choice, 3 for Short answer, 4 for Narrative');
            $table->unsignedInteger('difficulty')->nullable()->comment('between 1-5');
            $table->string('exam_title')->nullable();
            $table->string('problem_related_image')->nullable();
            $table->string('attachment')->nullable();
            $table->longText('answer')->nullable();

            $table->string('mcq1')->nullable();
            $table->string('mcq2')->nullable();
            $table->string('mcq3')->nullable();
            $table->string('mcq4')->nullable();
            $table->string('mcq5')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_exam_questions');
    }
}
