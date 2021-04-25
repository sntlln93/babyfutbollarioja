<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Club;
use App\Models\Game;
use App\Models\Type;
use App\Models\Category;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
        $types = Type::all();

        return view('dashboard.tournaments.create')
            ->with('types', $types)
            ->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'categories' => 'required',
            'categories.*' => 'required',
            'type_id' => 'required'
        ]);

        $tournament = DB::transaction(function () use ($validatedData) {
            $tournament = Tournament::create([
                'name' => $validatedData['name'],
                'type_id' => $validatedData['type_id']
            ]);

            return $tournament
                ->categories()
                ->sync($validatedData['categories']);
        });

        return redirect()->route('tournaments.show', ['tournament' => $tournament->id]);
    }

    public function show(Tournament $tournament)
    {
        $categories = $tournament->categories->pluck('id');
        $clubs = Club::whereIn('id', $categories)->get();
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
