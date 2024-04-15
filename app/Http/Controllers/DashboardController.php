<?php

namespace App\Http\Controllers;

use App\Models\idea;
use App\Models\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        //check if there is a search
        //if there is, check the search value with our database

        $ideas = idea::orderBy('created_at', 'DESC');

        //$topUsers = User::OrderBy('created_at', 'DESC')->limit(5)->get();

        $topUsers = User::withCount('ideas')->orderBy('ideas_count', 'DESC')->limit(5)->get();
        if(request()->has('search')) {
            //where content like %something%
            $ideas = $ideas->where('content', 'like', '%' . request()->get('search', '') .'%');
        }

        return view('dashboard', ['ideas'=> $ideas->paginate(5), 'topUsers' => $topUsers]);
    }
}
