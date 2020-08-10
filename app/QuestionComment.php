<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionComment extends Model
{
     public function question(){
    	return $this->belongsTo('App\Question');
    }

    public function question_replay(){
    	return $this->hasMany('App\QuestionReplay');
    }
}
