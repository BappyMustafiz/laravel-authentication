<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_exams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('training_id');
            $table->string('test_title');
            $table->timestamp('start_period')->nullable();
            $table->timestamp('end_period')->nullable();
            $table->unsignedInteger('time_limit')->nullable()->comment('exam duration');
            $table->unsignedInteger('number_of_question')->nullable();
            $table->float('marks_per_question')->nullable();
            $table->unsignedInteger('exam_type')->nullable()->comment('1 for Midterm exam, 2 for Finals, 3 for Bible test');
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
        Schema::dropIfExists('training_exams');
    }
}
