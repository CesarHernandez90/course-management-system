<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseVsProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_profile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('course_id')->unsigned();
            $table->bigInteger('profile_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('profile_id')->references('id')->on('profiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_vs_profile');
    }
}
