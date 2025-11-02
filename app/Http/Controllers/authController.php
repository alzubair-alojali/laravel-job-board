<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authController extends Controller
{
    public function showSignupForm()
    {
        return view("auth/signup",['pageTitle'=>'signup']);
    }
    public function signup(Request $request)
    {

    }

    public function showLoginForm()
    {
        return view("auth/login",['pageTitle'=>'login']);
    }
    public function login(Request $request)
    {

    }
    public function logout()
    {

    }
}
