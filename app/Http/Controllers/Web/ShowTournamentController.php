<?php

namespace App\Http\Controllers\Web;

use App\Models\Tournament;
use App\Http\Controllers\Controller;
use App\Http\Services\ScoreboardRow;

class ShowTournamentController extends Controller
{
    public function index()
    {
        return back();
    }

    public function scoreboard(Tournament $tournament)
    {
        $games = $tournament->games->whereNotNull('local_score')->whereNotNull('away_score');

        foreach ($games as $game) {
            $scoreboard[$game->local->id] =(new ScoreboardRow)->get($game->local, $game->local_score, $game->away_score, $scoreboard[$game->local->id] ?? []);
            $scoreboard[$game->away->id] =(new ScoreboardRow)->get($game->away, $game->away_score, $game->local_score, $scoreboard[$game->away->id] ?? []);
        }

        return view('web.tournaments.scoreboard')->with('tournament', $tournament)
        ->with('scoreboard', collect($scoreboard)->sortByDesc('pts'));
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
