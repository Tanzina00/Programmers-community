<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionReplay extends Model
{
    public function question_comment(){
     	return $this->belongsTo('App\QuestionComment');
     }
}
