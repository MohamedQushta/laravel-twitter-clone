<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    //we pass in the user that we want to follow
    public function follow(User $user){
        //this is the id of the user, which is us that want to follow the passed user
        $follower = auth()->user();

        $follower->followings()->attach($user);
        return redirect()->route('users.show', $user->id)->with('success', "followed successfully");
    }

    public function unfollow(User $user){
        $follower = auth()->user();

        $follower->followings()->detach($user);
        return redirect()->route('users.show', $user->id)->with('sucess', 'unfollowed successfully!');
    }
}
