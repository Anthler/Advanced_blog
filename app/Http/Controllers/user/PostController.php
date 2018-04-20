<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Post;

class PostController extends Controller
{
    public function post(Post $post){
    	
    	return view('user/blog/post', compact('post'));
    }
}
