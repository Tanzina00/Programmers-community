<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

 public function category(){
    	 return $this->belongsTo('App\Category');
    }

	public function question_comments(){
	return $this->hasMany('App\QuestionComment');
}

    public function tags(){
	return $this->belongsToMany('App\Tag');
}


}
