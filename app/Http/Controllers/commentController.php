<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;

class commentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Eloquent ORM -> Get all data
        $data=comment::paginate(10);
        //pass the data to the view
        return view("comment/index",['comments'=>$data,'pageTitle'=>'blog']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comment/create', ['pageTitle' => 'create comment']);
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
        $comment = comment::findOrFail($id);
        return view('comment/show', ['comment' => $comment, 'pageTitle' => 'edit comment']);
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
        // TODO this will be completed in form section
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // TODO this will be completed in form section
    }
}
