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
        $posts = Post::orderBy('created_at', 'desc')->take(5)->get();
        $tournament = Tournament::where('is_main', true)->first();

        if (!$tournament) {
            return view('web.welcome.unselected')
            ->with('posts', $posts);
        }
        
        $clubs = Club::all();

        if ($tournament->type === 'todos contra todos') {
            $view = 'web.welcome.league_selected';
        }
        if ($tournament->type === 'fase de grupos') {
            $view = 'web.welcome.groups_selected';
        }
        if ($tournament->type === 'llaves') {
            $view = 'web.welcome.playoffs_selected';
        }

        return view($view)
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
