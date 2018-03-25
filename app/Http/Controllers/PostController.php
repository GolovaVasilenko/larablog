<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

    }

    public function show($slug)
    {
    	return view('posts.show', [
    		'post' => Post::where('slug', $slug)->first()
	    ]);
    }
}
