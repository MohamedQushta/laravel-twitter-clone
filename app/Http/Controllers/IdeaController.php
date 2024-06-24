<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(){
        $idea = Idea::create(
            [
                'content' => request()->get('idea', null),//this gets the idea from the form using the name of the text are that contains the idea
            ]
            );

            return redirect()->route('dashboard');
    }
}
