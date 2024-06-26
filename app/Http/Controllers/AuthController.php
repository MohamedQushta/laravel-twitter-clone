<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function store(){
        //validate the request
        $validated = request()->validate(
            [
                'name' => 'required|min:3|max:255',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required|min:8|confirmed|max:255',
                //confirmed means that the password and password_confirmation must be the same
            ]
        );
        //create a user
        $user = User::create(
            [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
            ]
        );

        //redirect to the dashboard
        return redirect()->route('dashboard')->with('success', 'Account created successfully');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function authenticate(){
        //validate the request
        $validated = request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8',
                //confirmed means that the password and password_confirmation must be the same
            ]
        );

        if(auth()->attempt($validated))
        {
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Account logged in successfully');
        }
        return redirect()->route('login')->withErrors(
            [
                'email' => 'No user match this credentials'
            ]
        );
    }
    public function logout(){
        //this function logs the user out
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
    }
}
