<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Game;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FetchFilteredGamesFromTournamentController extends Controller
{
    public function get(Request $request, Tournament $tournament)
    {
        $games = Game::query()
            ->with('category')
            ->where('tournament_id', $tournament->id)
            ->get();

        if ($request->has('category') && $request->category) {
            $games = $games->filter(fn ($game) => $game->category_id == $request->category);
        }

        if ($request->has('group') && $request->group) {
            $games = $games->filter(fn ($game) => $game->group == $request->group);
        }
        
        return $games;
    }
}
