<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Club;
use App\Models\Team;
use App\Models\Image;
use App\Models\Phone;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ClubController extends Controller
{
    public function index()
    {
        $clubs = Club::with('teams')->paginate(20);

        return view('dashboard.clubs.index')->with('clubs', $clubs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.clubs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedClub = $request->validate([
            'name' => 'required',
            'field_description' => 'required',
            'shield' => 'required',
            'area_code' => 'required|integer|digits_between:3,4',
            'number' => 'required|integer|digits_between:5,7',
        ]);

        DB::transaction(function () use ($validatedClub) {
            $club = Club::create([
                'name' => $validatedClub['name'],
                'field_description' => $validatedClub['field_description'],
            ]);

            Image::create([
                'path' => $validatedClub['shield']->store('clubs', 'public'),
                'imageable_id' => $club->id,
                'imageable_type' => Club::class
            ]);

            $categories = Category::where('is_active', true)->pluck('id');

            foreach ($categories as $category) {
                Team::create([
                    'club_id' => $club->id,
                    'category_id' => $category
                ]);
            }

            Phone::create([
                'area_code' => $validatedClub['area_code'],
                'number' => $validatedClub['number'],
                'phoneable_id' => $club->id,
                'phoneable_type' => Club::class
            ]);
        });

        return redirect()->route('clubs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        return view('dashboard.clubs.show')->with('club', $club);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        return view('dashboard.clubs.edit')->with('club', $club);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Club $club)
    {
        $validatedClub = $request->validate([
            'name' => 'required',
            'field_description' => 'required',
        ]);

        $club->update([
            'name' => $validatedClub['name'],
            'field_description' => $validatedClub['field_description'],
        ]);

        return redirect()->route('clubs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        DB::transaction(function () use ($club){
            $club->phone()->delete();
            $club->delete();
        });

        return redirect()->route('clubs.index');
    }
}