<?php

namespace App\Http\Controllers\Web;

use App\Models\Game;
use App\Models\Team;
use App\Http\Controllers\Controller;

class ShowTeamController extends Controller
{
    public function show(Team $team)
    {
        $games = Game::query()
            ->where(function ($query) use ($team) {
                $query->whereJsonContains('local->id', $team->id)
                    ->orWhereJsonContains('away->id', $team->id);
            })
            ->get();

        $gamesAsLocal = $games->filter(function ($game) use ($team) {
            return $game->local->id == $team->id;
        });
        
        $gamesAsVisitor = $games->filter(function ($game) use ($team) {
            return $game->away->id == $team->id;
        });

        $stats = [
            'gp' => $games->filter(fn ($game) => $game->local_score !== null && $game->away_score !== null)->count(),
            'gw' => $gamesAsLocal->filter(fn ($game) => $game->local_score > $game->away_score)->count() + $gamesAsVisitor->filter(fn ($game) => $game->away_score > $game->local_score)->count(),
            'gl' => $gamesAsLocal->filter(fn ($game) => $game->local_score < $game->away_score)->count(), + $gamesAsVisitor->filter(fn ($game) => $game->away_score < $game->local_score)->count(),
            'gd' => $games->filter(fn ($game) => $game->local_score === $game->away_score && $game->local_score !== null && $game->away_score !== null)->count(),
            'gf' => $gamesAsVisitor->sum('away_score') + $gamesAsLocal->sum('local_score'),
            'ga' => $gamesAsVisitor->sum('local_score') + $gamesAsLocal->sum('away_score'),
        ];

        return view('web.teams.show')->with('team', $team)->with('stats', $stats);
    }
}
