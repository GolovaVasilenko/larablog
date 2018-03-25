<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.post.index', [
        	'posts' => Post::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$tags = Tag::pluck('title', 'id')->all();
    	$categories = Category::pluck('title', 'id')->all();

        return view('admin.post.create', [
        	'tags' => $tags,
	        'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        	'title' => 'required',
	        'image' => 'nullable',
        ]);

        $post = Post::add($request->all());

        $post->uploadImage($request->file('image'));
        $post->setCategory($request->get('category_id'));
        $post->setTags($request->get('tags'));
        $post->toggleStatus($request->get('status'));

	    return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$post = Post::find($id);
	    $tags = Tag::pluck('title', 'id')->all();
	    $categories = Category::pluck('title', 'id')->all();

	    return view('admin.post.edit', [
		    'tags' => $tags,
		    'categories' => $categories,
		    'post' => $post,
		    'selectedTags' => $post->tags->pluck('id')->all(),
	    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
	    $this->validate($request, [
		    'title' => 'required',
		    'image' => 'nullable',
	    ]);

	    $post = Post::find($id);
	    $post->edit($request->all());

	    $post->uploadImage($request->file('image'));
	    $post->setCategory($request->get('category_id'));
	    $post->setTags($request->get('tags'));
	    $post->toggleStatus($request->get('status'));

	    return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->remove();

        return redirect()->route('posts.index');
    }
}
