<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->unsignedInteger('from_class');
            $table->foreign('from_class')->references('id')->on('classes')->onDelete('cascade');
            $table->unsignedInteger('from_section');
            $table->foreign('from_section')->references('id')->on('sections')->onDelete('cascade');
            $table->unsignedInteger('to_class');
            $table->foreign('to_class')->references('id')->on('classes')->onDelete('cascade');
            $table->unsignedInteger('to_section');
            $table->foreign('to_section')->references('id')->on('sections')->onDelete('cascade');
            $table->string('academic_year');
            $table->string('academic_year_new');
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
        Schema::dropIfExists('promotions');
    }
}
