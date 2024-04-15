<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\idea;
use App\Models\User;

class IdeaLikeController extends Controller
{
    public function like(idea $idea) {
        $liker = auth()->user();
        $liker->likes()->attach($idea);
        return redirect()->back()->with('success', "liked successfully");
    }

    public function unlike(idea $idea) {
        $liker = auth()->user();
        $liker->likes()->detach($idea);
        return redirect()->back()->with('success', "unliked successfully");

    }
}
