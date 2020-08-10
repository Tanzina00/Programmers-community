<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertJobCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('alert_jobs_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jobscategory_id')->unsigned();
            $table->foreign('jobscategory_id')->references('id')->on('job_categories');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
           
        });

         Schema::create('alert_jobs_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('location_id')->unsigned();
            $table->foreign('location_id')->references('id')->on('locations');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
           
        });

         Schema::create('alert_jobs_salary', function (Blueprint $table) {
            $table->increments('id');
            $table->string('salary_range');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
           
        });

         Schema::create('alert_jobs_level', function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_level');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
           
        });

         Schema::create('alert_jobs_hour', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hours');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('alert_jobs_category');
         Schema::dropIfExists('alert_jobs_locations');
         Schema::dropIfExists('alert_jobs_salary');
         Schema::dropIfExists('alert_jobs_level');
         Schema::dropIfExists('alert_jobs_hour');

    }
}
