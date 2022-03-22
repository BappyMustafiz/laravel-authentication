<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHowItWorkContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('how_it_work_contents', function (Blueprint $table) {
            $table->id();
            $table->string('section_title');
            $table->string('step_title')->nullable();
            $table->string('main_title');
            $table->text('content')->nullable();
            $table->string('section_image')->nullable();
            $table->string('section_video')->nullable();
            $table->string('home_video_url')->nullable();
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
        Schema::dropIfExists('how_it_work_contents');
    }
}
