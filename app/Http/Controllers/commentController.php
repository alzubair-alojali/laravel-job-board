<?php

namespace App\Http\Controllers;

use App\Http\Requests\commentRequest;
use App\Models\comment;
use App\Models\Post;
use Illuminate\Http\Request;

class commentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect('/blog');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect('/blog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(commentRequest $request)
    {
        $post= Post::findOrFail($request->post_id);
        $comment = new comment();
        $comment->post_id=$request->input('post_id');
        $comment->content= $request->input('content');
        $comment->author=$request->input('author');
        $comment->save();
        return redirect("/blog/{$post->id}")->with('success','comment created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect('/blog');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = comment::findOrFail($id);
        return view('comment/edit', ['comment' => $comment,'pageTitle' => 'edit comment']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment = comment::findOrFail($id);
        $comment->content=$request->input('content');
        $comment->author=$request->input('author');
        $comment->save();
        return redirect("/blog/{$comment->post_id}")->with('success','comment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = comment::findOrFail($id);
        $postid = $comment->post_id;
        $comment->delete();
        return redirect("/blog/{$postid}")->with('success','comment deleted successfully');
    }
}
