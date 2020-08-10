<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  
  public function category(){
    	 return $this->belongsTo('App\ArticleCategory');
    }
    
// public function tags(){
// 	return $this->belongsToMany('App\Tag');
// }
public function comments(){
	return $this->hasMany('App\Comment');
}

}

