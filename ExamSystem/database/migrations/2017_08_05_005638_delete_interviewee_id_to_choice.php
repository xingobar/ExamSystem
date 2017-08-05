<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteIntervieweeIdToChoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('choice', function (Blueprint $table) {
            $table->dropColumn('interviewee_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('choice', function (Blueprint $table) {
            $table->unsignedInteger('interviewee_id')->index();
        });
    }
}
