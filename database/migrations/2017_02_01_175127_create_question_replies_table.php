<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_replays', function (Blueprint $table) {
             $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->text('comment');
            $table->boolean('approved');
            $table->integer('comment_id')->unsigned();
            $table->timestamps();
        });
         Schema::table('question_replays',function($table){
         $table->foreign('comment_id')->references('id')->on('question_comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropForeign(['comment_id']);
        Schema::dropIfExists('question_replays');
    }
}
