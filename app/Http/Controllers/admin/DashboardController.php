<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(!auth()->user()->is_admin) {
            abort(403);
        }

        //Log::info('inside admin dashboard controller');

        return view('admin.dashboard');
    }
}
