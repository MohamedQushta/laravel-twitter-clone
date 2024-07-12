<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    public function register(Request $request){
        //validate the request
        // $validated = request()->validate(
        //     [
        //         'name' => 'required|min:3|max:255',
        //         'email' => 'required|email|max:255|unique:users,email',
        //         'password' => 'required|min:8|confirmed|max:255',
        //         //confirmed means that the password and password_confirmation must be the same
        //     ]
        // );
        //create a user
        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]
        );

        //redirect to the dashboard
        if (!User::where('email', $request->email)->exists()) {
            return response()->json(['message'=> 'Success', ], 201);


        }else{
            return response()->json([
                'message' => 'Email is already taken',
            ], 404);
        }
    }
}
