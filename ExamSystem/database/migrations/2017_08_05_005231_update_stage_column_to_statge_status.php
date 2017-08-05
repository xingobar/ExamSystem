<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateStageColumnToStatgeStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stage_status', function (Blueprint $table) {
            $table->dropColumn('position_id');
            $table->unsignedInteger('stage_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stage_status', function (Blueprint $table) {
            $table->unsignedInteger('position_id')->index();
            $table->dropColumn('stage_id');
        });
    }
}
