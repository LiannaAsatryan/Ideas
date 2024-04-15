<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class ideaController extends Controller
{
    public function store()
    {
        $validated = request()->validate([
            'content'=>'required|min:5|max:240'
        ]);

        $validated['user_id'] = auth()->id();

        $idea = new idea();
        $idea->user_id = $validated['user_id'] ;
        $idea->content = request()->get('content', '');
        //$idea->likes = 0;
        $idea->save();

        return redirect()->route('dashboard')->with('success', 'idea created successfully!');
    }

    public function destroy(idea $idea) {
        if(auth()->id() !== $idea->user_id) {
            abort(404, "Not allowed !!!");
        }

        //$idea=idea::where('id', $idea)->firstorFail()->delete();
        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'idea deleted successfully !!!');
    }

    public function show(idea $idea) {
        return view('ideas.show', ['idea' => $idea]);
    }

    public function edit(idea $idea) {
        if(auth()->id() !== $idea->user_id) {
            abort(404, "Not allowed !!!");
        }

        $editing = true;
        return view('ideas.show', ['idea' => $idea, 'editing' => $editing]);
    }

    public function update(idea $idea) {
        if(auth()->id() !== $idea->user_id) {
            abort(404, "Not allowed !!!");
        }

        request()->validate([
            'content'=>'required|min:5|max:240'
        ]);

        $idea->content = request()->get('content', '');
        $idea->save();
        return redirect()->route('idea.show', $idea->id)->with('success', "idea updated successfully!!!");
    }

}
