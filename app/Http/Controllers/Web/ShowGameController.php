<?php

namespace App\Http\Controllers\Web;

use App\Models\Game;
use App\Http\Controllers\Controller;

class ShowGameController extends Controller
{
    public function show(Game $game)
    {
        $events = $game->events;
        $localEvents = $events->filter(fn ($event) => $event->player->teamId == $game->local->id)->sortBy('minute');
        $awayEvents = $events->filter(fn ($event) => $event->player->teamId == $game->away->id)->sortBy('minute');

        return view('web.games.result')
        ->with('localEvents', $localEvents)
        ->with('awayEvents', $awayEvents)
        ->with('game', $game);
    }
}
