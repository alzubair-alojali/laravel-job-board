<?php

namespace App\Http\Controllers;
use App\Http\Requests\loginRequest;
use App\Http\Requests\signupRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class authController extends Controller
{
    public function showSignupForm()
    {
        return view("auth/signup", ['pageTitle' => 'signup']);
    }
    public function signup(signupRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();
        auth()->login($user);
        return redirect('/');
    }

    public function showLoginForm()
    {
        return view("auth/login", ['pageTitle' => 'login']);
    }
    public function login(loginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (auth('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }





    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
