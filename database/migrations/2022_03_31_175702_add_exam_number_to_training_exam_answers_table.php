<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExamNumberToTrainingExamAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('training_exam_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('exam_number')->after('user_id')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('training_exam_answers', function (Blueprint $table) {
            $table->dropColumn('exam_number');
        });
    }
}
