<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAnswerColumnToAnswer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answer', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->unsignedInteger('question_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answer', function (Blueprint $table) {
            $table->string('type');
            $table->dropColumn('question_id');
        });
    }
}
