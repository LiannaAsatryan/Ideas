<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();
        $followingIds = $user->followings()->pluck('user_id');
        $ideas = idea::wherein('user_id', $followingIds)->latest();

        if(request()->has('search')) {
            //where content like %something%
            $ideas = $ideas->where('content', 'like', '%' . request()->get('search', '') .'%');
        }

        return view('dashboard', ['ideas'=> $ideas->paginate(5)]);
    }
}
