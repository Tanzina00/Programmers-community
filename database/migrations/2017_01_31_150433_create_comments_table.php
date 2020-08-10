<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
     
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->text('comment');
            $table->boolean('approved');
            $table->integer('article_id')->unsigned();
            $table->timestamps();
            
  });
        Schema::table('comments',function($table){
         $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
        });
    }
 
    public function down()
    {   Schema::dropForeign(['article_id']);
        Schema::dropIfExists('comments');
    }
}
