<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamInfoTable extends Migration
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
            $table->unsignedInteger('stage_id')->index();
            $table->string('location');
            $table->string('position');
            $table->unsignedInteger('pass_score');
            $table->string('end_time'); /// format : days hours:mins
            $table->unsignedInteger('question_num');
            $table->unsignedInteger('question_group_num');
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
