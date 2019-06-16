<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 150);
            $table->string('schedule', 150)->nullable();
            $table->text('description')->nullable();
            /* $table->string('img', 150)->nullable(); */
            $table->timestamps();
            $table->bigInteger('id_course_type')->unsigned();
            $table->bigInteger('id_period')->unsigned();
            $table->bigInteger('id_department')->unsigned();
            $table->bigInteger('id_teacher')->unsigned()->nullable();
            $table->foreign('id_course_type')->references('id')->on('course_types');
            $table->foreign('id_period')->references('id')->on('periods');
            $table->foreign('id_department')->references('id')->on('departments');
            $table->foreign('id_teacher')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
