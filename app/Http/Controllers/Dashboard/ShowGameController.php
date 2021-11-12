<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Game;
use App\Http\Controllers\Controller;

class ShowGameController extends Controller
{
    public function show(Game $game)
    {
        return view('dashboard.games.show')->with('game', $game);
    }
}
