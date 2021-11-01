<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('instructor_id');
            $table->string('section_id');
            $table->string('Course');
            $table->integer('question_lenth');
            $table->string('uniqueid');
            $table->string('time');

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
        Schema::dropIfExists('exam_info');
    }
}
