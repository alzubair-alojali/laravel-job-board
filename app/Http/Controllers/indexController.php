<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    function index()
    {
        return view("index",["pageTitle"=>"home page"]);
    }
    function about(){
        return view("about",["pageTitle"=>"about page"]);
    }

    function contact(){
        return view( "contact",["pageTitle"=>"contact page"]);
    }

}
