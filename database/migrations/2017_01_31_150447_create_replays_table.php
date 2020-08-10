<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replays', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->text('comment');
            $table->boolean('approved');
            $table->integer('comment_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('replays',function($table){
         $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }
 
    public function down()
    {    Schema::dropForeign(['comment_id']);
        Schema::dropIfExists('replays');
    }
}
