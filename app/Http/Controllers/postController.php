<?php

namespace App\Http\Controllers;

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
        $data = Post::cursorPaginate(5);
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
    public function store(Request $request)
    {
        // TODO this will be completed in form section
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
        return view('post/edit', ['pageTitle' => 'edit post']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
