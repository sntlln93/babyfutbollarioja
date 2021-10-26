<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Club;
use App\Models\Image;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClubRequest;
use App\Services\CreateImageService;
use App\Services\CreatePhoneService;
use App\Services\CreateTeamsFromClubService;
use App\Services\DeleteImageFromDiskService;

class ClubController extends Controller
{
    public function index()
    {
        $clubs = Club::with('teams')->paginate(20);

        return view('dashboard.clubs.index')->with('clubs', $clubs);
    }

    public function create()
    {
        return view('dashboard.clubs.create');
    }

    public function store(StoreClubRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validatedClub = $request->validatedClub();
            $validatedPhone = $request->validatedPhone();

            $club = Club::create($validatedClub);

            (new CreateTeamsFromClubService)->create($club->id);
            (new CreatePhoneService)->create($club, $validatedPhone['area_code'], $validatedPhone['number']);
        });

        return redirect()->route('clubs.index');
    }

    public function show(Club $club)
    {
        return view('dashboard.clubs.show')->with('club', $club);
    }

    public function edit(Club $club)
    {
        return view('dashboard.clubs.edit')->with('club', $club);
    }

    public function update(Request $request, Club $club)
    {
        $validatedClub = $request->validate([
            'name' => 'required',
            'field_description' => 'required',
        ]);

        $validatedPhone = $request->validate([
            'area_code' => 'required','integer','digits_between:3,4',
            'number' => 'required','integer','digits_between:5,7',
        ]);

        $club->update($validatedClub);

        $club->phone->update($validatedPhone);

        return redirect()->route('clubs.index');
    }

    public function destroy(Club $club)
    {
        DB::transaction(function () use ($club) {
            (new DeleteImageFromDiskService)->delete($club->logo);
            $club->phone()->delete();
            $club->delete();
        });

        return redirect()->route('clubs.index');
    }
}
