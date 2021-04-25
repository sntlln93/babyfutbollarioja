<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Game;
use App\Models\Post;
use App\Models\Event;
use App\Models\Tournament;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tournament_count = Tournament::all()->count();
        $game_count = Game::all()->count();
        $goal_count = Event::where('type', 'gol')->count();
        $post_count = Post::all()->count();

        return view('dashboard.home')
            ->with('tournament_count', $tournament_count)
            ->with('goal_count', $goal_count)
            ->with('post_count', $post_count)
            ->with('game_count', $game_count);
    }
}
