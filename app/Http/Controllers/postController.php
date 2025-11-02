<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //display 5 data for each page
        $data = Post::latest()->cursorPaginate(10);
        //pass the data to the view
        return view("post/index", ['posts' => $data, 'pageTitle' => 'blog']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post/create', ['pageTitle' => 'create post']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogPostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->author = $request->author;
        $post->body = $request->body;
        $post->published =request()->has('published');

        $post ->save();

        return redirect('/blog')->with('success','post created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //findorfail mean if there are no data you will return to 404 page
        $post = Post::findOrFail($id);
        return view('post/show', ['post' => $post, 'pageTitle' => $post->title]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('post/edit', ['post'=>$post,'pageTitle' => 'edit post']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogPostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->author = $request->author;
        $post->body = $request->body;
        $post->published =request()->has('published');
        $post ->save();

        return redirect('/blog')->with('success','post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/blog')->with('success','post deleted successfully');
    }
}