<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToHomeContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('home_contents', function (Blueprint $table) {
            $table->string('avatar_one_title')->after('home_video_url')->nullable();
            $table->string('avatar_one_image')->after('avatar_one_title')->nullable();
            $table->string('avatar_two_title')->after('avatar_one_image')->nullable();
            $table->string('avatar_two_image')->after('avatar_two_title')->nullable();
            $table->string('avatar_three_title')->after('avatar_two_image')->nullable();
            $table->string('avatar_three_image')->after('avatar_three_title')->nullable();
            $table->string('decoration_one_image')->after('avatar_three_image')->nullable();
            $table->string('decoration_two_image')->after('decoration_one_image')->nullable();
            $table->string('decoration_three_image')->after('decoration_two_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('home_contents', function (Blueprint $table) {
            $table->dropColumn('avatar_one_title');
            $table->dropColumn('avatar_one_image');
            $table->dropColumn('avatar_two_title');
            $table->dropColumn('avatar_two_image');
            $table->dropColumn('avatar_three_title');
            $table->dropColumn('avatar_three_image');
            $table->dropColumn('decoration_one_image');
            $table->dropColumn('decoration_two_image');
            $table->dropColumn('decoration_three_image');
        });
    }
}
