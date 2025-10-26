<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class tagController extends Controller
{
    function index(Request $request)
    {
        //Eloquent ORM -> Get all data
        $data = tag::all();
        //pass the data to the view
        return view("tag/index", ['tags' => $data, 'pageTitle' => 'tag']);
    }
    function create()
    {
        tag::create([
            'title' => 'js',
        ]);
        return redirect('/tag');
    }
    function delete()
    {
        Tag::destroy(1);
        return redirect('/tag');
    }
    function testmanytomany()
    {
        $post2 = Post::find(2);
        $post3 = Post::find(3);

        
        $post3->tags()->attach([2]);

        return response()->json([
            'post2' => $post2->tags,
            'post3' => $post3->tags,
        ]);
    }
}
