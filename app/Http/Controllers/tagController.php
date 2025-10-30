<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class tagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Eloquent ORM -> Get all data
        $data=Tag::paginate(10);
        //pass the data to the view
        return view("tag/index",['tags'=>$data,'pageTitle'=>'tag']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tag/create', ['pageTitle' => 'create tag']);
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
        $tag = Tag::findOrFail($id);
        return view('tag/show', ['tag' => $tag, 'pageTitle' => 'edit tag']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tag::findOrFail($id);
        return view('tag/edit', ['tag' => $tag,'pageTitle' => 'edit tag']);
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
