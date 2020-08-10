<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAlertJobLevelId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alert_jobs_level', function (Blueprint $table) {
           $table->integer('alert_level_id')->unsigned();
            $table->foreign('alert_level_id')->references('id')->on('job_levels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alert_jobs_level', function (Blueprint $table) {
            
        });
    }
}
