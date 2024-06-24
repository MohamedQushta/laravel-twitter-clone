<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(){

        request()->validate([
            'idea' => 'required|min:5|max:255',
        ]);
        //required means that it is required to fill in the text area
        $idea = Idea::create(
            [
                'content' => request()->get('idea', null),//this gets the idea from the form using the name of the text are that contains the idea
            ]
            );

            return redirect()->route('dashboard')->with('success', 'Idea created successfully');
    }
    public function destroy($id){
        $idea = Idea::where('id', $id)->firstOrFail();
        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully');
    }
}
