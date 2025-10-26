<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;

class commentController extends Controller
{
    function index(Request $request)
    {
        //Eloquent ORM -> Get all data
        $data=comment::all();
        //pass the data to the view
        return view("comment/index",['comments'=>$data,'pageTitle'=>'blog']);
    }
    function create(){
        comment::create([
            'author'=>'ali',
            'content'=> 'this is a first test comment',
            'post_id'=>2
        ]);
        return redirect('/comments');
    }
}
