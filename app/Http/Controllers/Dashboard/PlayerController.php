<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Club;
use App\Models\Team;
use App\Models\Player;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\DeleteImageFromDiskService;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::paginate(20);
        return view('dashboard.players.index')->with('players', $players);
    }

    public function create()
    {
        return view('dashboard.players.create');
    }

    public function store(Request $request)
    {
        $validatedPlayer = $request->validate([
            'lastname' => 'required',
            'name' => 'required',
            'dni' => 'required|digits_between:7,9',
            'born_in' => 'required|date',
            'photo' => 'sometimes|mimes:jpg,jpeg',
            'team_id' => 'required',
        ]);

        DB::transaction(function () use ($validatedPlayer) {
            $base_path = Str::afterLast(Str::lower(get_class(new Club)), '\\');

            $player = Player::create([
                'lastname' => $validatedPlayer['lastname'],
                'name' => $validatedPlayer['name'],
                'born_in' => Carbon::parse($validatedPlayer['born_in']),
                'dni' => $validatedPlayer['dni'],
                'photo' => array_key_exists('photo', $validatedPlayer) ? $validatedPlayer['photo']->store($base_path, 'public') : null,
            ]);

            $player->teams()->sync($validatedPlayer['team_id']);
        });

        return redirect()->route('players.index');
    }

    public function edit(Player $player)
    {
        return view('dashboard.players.edit')->with('player', $player);
    }

    public function update(Player $player, Request $request)
    {
        $validatedPlayer = $request->validate([
            'lastname' => 'required',
            'name' => 'required',
            'dni' => 'required|numeric',
        ]);

        $player->update($validatedPlayer);

        return redirect()->route('players.index');
    }

    public function destroy(Player $player)
    {
        DB::transaction(function () use ($player) {
            (new DeleteImageFromDiskService)->delete($player->photo);
            $player->teams()->detach();
            $player->delete();
        });

        return redirect()->route('players.index');
    }

    public function show(Player $player)
    {
        return view('dashboard.players.show')->with('player', $player);
    }
}
