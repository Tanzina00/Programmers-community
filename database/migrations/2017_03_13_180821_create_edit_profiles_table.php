<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edit_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('education');
            $table->string('bio');
          $table->integer('users_id')->unsigned();
          $table->foreign('users_id')->references('id')->on('users');
          $table->integer('profession_category')->unsigned();
          $table->foreign('profession_category')->references('id')->on('categories');



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
        Schema::dropIfExists('edit_profiles');
    }
}
