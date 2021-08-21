<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homework', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');

            $table->unsignedInteger('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects');

            $table->unsignedInteger('classes_id');
            $table->foreign('classes_id')->references('id')->on('classes');

            $table->unsignedInteger('section_id');
            $table->foreign('section_id')->references('id')->on('sections');

            $table->unsignedInteger('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('teachers');

            $table->date('date');
            $table->string('information');
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
        Schema::dropIfExists('homework');
    }
}