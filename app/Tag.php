<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
   // public function articles(){
   //  	return $this->belongsToMany('App\Article','article_tags');
   //  }

    public function questions(){
    	return $this->belongsToMany('App\Question','question_tag');
    }
    



}
