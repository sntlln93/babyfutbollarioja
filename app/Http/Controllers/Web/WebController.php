<?php

namespace App\Http\Controllers\Web;

use App\Models\Club;
use App\Models\Post;
use App\Models\Tournament;
use App\Http\Controllers\Controller;

class WebController extends Controller
{
    public function index()
    {
        $tournament = Tournament::where('is_active', true)->first();
        $posts = Post::orderBy('created_at', 'desc')->take(5)->get();
        $clubs = Club::all();

        return view('web.welcome')
            ->with('clubs', $clubs)
            ->with('tournament', $tournament)
            ->with('posts', $posts);
    }

    public function about()
    {
        return view('web.about-us');
    }

    public function sponsors()
    {
        return view('web.sponsors');
    }
}
