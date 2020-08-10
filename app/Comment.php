<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function article(){
    	return $this->belongsTo('App\Article');
    }

    public function replay(){
    	return $this->hasMany('App\Replay');
    }
}
