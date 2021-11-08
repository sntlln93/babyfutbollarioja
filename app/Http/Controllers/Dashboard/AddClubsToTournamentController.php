<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Club;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddClubsToTournamentController extends Controller
{
    public function create(Tournament $tournament)
    {
        $categories = collect($tournament->categories)->pluck('id');
        
        $clubs = Club::query()
            ->select('clubs.*')
            ->join('teams', 'teams.club_id', '=', 'clubs.id')
            ->whereIn('teams.category_id', $categories)
            ->groupBy('clubs.id')
            ->get();

        return view('dashboard.tournaments.add-clubs')
            ->with('tournament', $tournament)
            ->with('clubs', $clubs);
    }

    public function store(Request $request, Tournament $tournament)
    {
        $clubs_id = $request->validate([
            'clubs' => 'required|array',
            'clubs.*' => 'required|exists:clubs,id',
        ])['clubs'];
        
        $clubs = Club::find($clubs_id)->map(function ($club) {
            return [
                'id' => $club->id,
                'name' => $club->name,
                'logo' => $club->logo
            ];
        });
        
        $tournament->update([
            'clubs' => $clubs
        ]);
        
        return redirect()->route('tournaments.show', $tournament);
    }
}
