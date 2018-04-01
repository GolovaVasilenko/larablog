<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

    }

    public function show($slug)
    {
    	return view('posts.show', [
    		'post' => Post::where('slug', $slug)->firstOrfail()
	    ]);
    }

    public function tagFilter($slug)
    {
    	$tag = Tag::where('slug', $slug)->firstOrfail();

    	return view('posts.filter', [
    		'posts' => $tag->posts()->paginate(2)
	    ]);
    }

    public function categoryFilter($slug)
    {
		$category = Category::where('slug', $slug)->firstOrfail();
	    return view('posts.filter', [
		    'posts' => $category->posts()->paginate(2)
	    ]);
    }
}
