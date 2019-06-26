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
            $table->string('img', 150)->nullable()->default('default.jpg');
            $table->timestamps();
            $table->bigInteger('course_type_id')->unsigned();
            $table->bigInteger('period_id')->unsigned();
            $table->bigInteger('department_id')->unsigned();
            $table->bigInteger('teacher_id')->unsigned()->nullable();
            $table->foreign('course_type_id')->references('id')->on('course_types');
            $table->foreign('period_id')->references('id')->on('periods');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('teacher_id')->references('id')->on('profiles');
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
