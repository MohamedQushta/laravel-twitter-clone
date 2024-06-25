<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class IdeaController extends Controller
{
    public function edit(Idea $idea){
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }
    public function update(Idea $idea){
        $validated = request()->validate([
            'content' => 'required|min:5|max:255',
        ]);
        $idea->save();
        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea updated successfully');
    }
    public function show(Idea $idea){
        // return view('ideas.show', [
        //     'idea' => $idea, //this passes the idea to the view
        // ]); //this passes the idea to the view
        return view('ideas.show', compact('idea')); //this passes the idea to the view using compact, finds a variable with the same name as the key and passes it to the view
    }
    public function store(){

        $validated = request()->validate([
            'content' => 'required|min:5|max:255',
            //required means that it is required to fill in the text area
        ]);

            Idea::create($validated);

            return redirect()->route('dashboard')->with('success', 'Idea created successfully');
    }
    public function destroy(Idea $id){
        $id->delete(); //this utilizes the route model binding to delete the idea with the given id
        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully');
    }
}
