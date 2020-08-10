<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('users_id')->unsigned();
            $table->string('name');
            $table->string('company_title');
            $table->string('location');
            $table->string('email');
            $table->string('jobs_type');
            $table->string('salary1');
            $table->string('salary2')->nullable();
            $table->string('academic_qualification');
            $table->string('skill');
            $table->string('binefits');
            $table->string('activities');
            $table->string('description');
            $table->timestamps();
        });

  Schema::table('jobs',function($table){
         $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['users_id']);
        Schema::dropIfExists('jobs');
    }
}
