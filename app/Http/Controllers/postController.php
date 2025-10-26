<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class postController extends Controller
{
    function index(Request $request)
    {
        //Eloquent ORM -> Get all data
        $data = Post::all();
        //pass the data to the view
        return view("post/index", ['posts' => $data, 'pageTitle' => 'blog']);
    }
    function create()
    {
        Post::create([
            'title' => 'test post for testing',
            'body' => 'this is my hooool content',
            'author' => 'yahya',
            'published' => true
        ]);
        return redirect('/blog');
    }
    function show($id)
    {
        //findorfail mean if there are no data you will return to 404 page
        $post = Post::findOrFail($id);
        return view('post/show', ['post' => $post, 'pageTitle' => $post->title]);
    }
    function delete()
    {
        post::destroy(1);
        return redirect('/blog');
    }
    function testmanytomany()
    {

    }
}
