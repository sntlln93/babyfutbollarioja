<?php

namespace App\Http\Controllers\Web;

use App\Models\Tournament;
use App\Http\Controllers\Controller;

class ShowTournamentController extends Controller
{
    public function index(){
        return back();
    }

    public function show (Tournament $tournament){
        return back();
    }
}
