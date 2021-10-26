<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Club;
use App\Models\Game;
use App\Models\Team;
use App\Models\Type;
use App\Models\Category;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTournamentRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\CreateImageService;

class TournamentController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::paginate(10);

        return view('dashboard.tournaments.index')->with('tournaments', $tournaments);
    }

    public function create()
    {
        $categories = Category::where('is_active', true)->get();

        return view('dashboard.tournaments.create')
            ->with('categories', $categories);
    }

    public function store(StoreTournamentRequest $request)
    {
        $validatedData = $request->validated();

        DB::transaction(function () use ($validatedData) {
            if ($validatedData['is_active']) {
                Tournament::query()->update(['is_active' => false]);
            }

            $tournament = Tournament::create([
                'name' => $validatedData['name'],
                'type' => $validatedData['type'],
                'is_private' => $validatedData['is_private'],
                'double_game' => $validatedData['double_game'],
                'is_active' => $validatedData['is_active'],
            ]);

            if (!$validatedData['is_private']) {
                (new CreateImageService)->create($tournament, $validatedData['photo']);
            }

            $tournament
                ->categories()
                ->sync($validatedData['categories']);
        });

        return redirect()->route('tournaments.index');
    }

    public function show(Tournament $tournament)
    {
        $categories = $tournament->categories->pluck('id');
        $teams = Team::whereIn('category_id', $categories)->pluck('club_id');
        $clubs = Club::whereIn('id', $teams)->get();
        $games = Game::where('tournament_id', $tournament->id)->paginate(20);

        return view('dashboard.tournaments.show')
            ->with('tournament', $tournament)
            ->with('clubs', $clubs)
            ->with('games', $games);
    }

    public function edit(Tournament $tournament)
    {
        return view('dashboard.tournaments.edit')->with('tournament', $tournament);
    }

    public function update(Request $request, Tournament $tournament)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $tournament->update([
            'name' => $validatedData['name'],
        ]);

        return redirect()->route('tournaments.show', ['tournament' => $tournament->id]);
    }

    public function destroy(Tournament $tournament)
    {
        $tournament->delete();

        return redirect()->route('tournaments.index');
    }
}
