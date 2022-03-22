<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingExamAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_exam_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('training_exam_id');
            $table->unsignedBigInteger('training_exam_question_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('correct')->nullable();
            $table->longText('answer')->nullable();
            $table->float('score')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_exam_answers');
    }
}
