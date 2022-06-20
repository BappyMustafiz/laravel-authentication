<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToHowItWorkContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('how_it_work_contents', function (Blueprint $table) {
            $table->string('main_title_2')->after('main_title')->nullable();
            $table->string('main_title_3')->after('main_title_2')->nullable();
            $table->text('content_2')->after('content')->nullable();
            $table->text('content_3')->after('content_2')->nullable();
            $table->string('section_image_2')->after('section_image')->nullable();
            $table->string('section_image_3')->after('section_image_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('how_it_work_contents', function (Blueprint $table) {
            $table->dropColumn('main_title_2');
            $table->dropColumn('main_title_3');
            $table->dropColumn('content_2');
            $table->dropColumn('content_3');
            $table->dropColumn('section_image_2');
            $table->dropColumn('section_image_3');
        });
    }
}
