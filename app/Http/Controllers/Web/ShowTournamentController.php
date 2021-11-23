<?php

namespace App\Http\Controllers\Web;

use App\Models\Tournament;
use App\Http\Controllers\Controller;

class ShowTournamentController extends Controller
{
    public function index()
    {
        return back();
    }

    public function fixture(Tournament $tournament)
    {
        $tournament->load('games');
        $dates = $tournament->games->map(fn ($game) => $game->group)->unique()->values();

        return view('web.tournaments.fixture')
        ->with('dates', $dates)
        ->with('tournament', $tournament);
    }
}
