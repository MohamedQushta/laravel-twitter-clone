<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaLikeController extends Controller
{
    public function like(Idea $idea){
        $liker = auth()->user();

        //attach method is only available for many to many relationships
        $liker->likes()->attach($idea);
        return redirect()->route('dashboard')->with('success',"liked successfully!");

    }

    public function unlike(Idea $idea){
        $unliker = auth()->user();

        //attach method is only available for many to many relationships
        $unliker->likes()->detach($idea);
        return redirect()->route('dashboard')->with('success',"unliked successfully!");
    }
}
