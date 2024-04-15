<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\idea;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(idea $idea) {
        if(!request()->get('content')) {
            return redirect()->route('dashboard')->withErrors("please fill in the comment field");
        }


        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->idea_id = $idea->id;
        $comment->content = request()->get('content');
        $comment->save();

        return redirect()->route('idea.show', $idea->id)->with('success', "comment posted successfully!");
    }
}
