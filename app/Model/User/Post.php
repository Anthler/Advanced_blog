<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    //protected $fillable = ['title','subtitle','slug','body'];

    public function tags(){

    	return $this->belongsToMany('App\Model\User\tag', 'post_tags')->withTimestamps();
    }

     public function categories(){
    	return $this->belongsToMany('App\Model\User\category','category_posts')->withTimestamps();
    }

    public function getRouteKeyName(){
    	return 'slug';
    }
}
