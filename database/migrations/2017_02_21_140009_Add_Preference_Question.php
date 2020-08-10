<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPreferenceQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('featured_interest_question', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('interest_id')->unsigned();
    $table->foreign('interest_id')->references('id')->on('categories');
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
        Schema::dropIfExists('featured_interest_question');
        
    }
}
