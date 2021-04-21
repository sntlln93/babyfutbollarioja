<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class WebController extends Controller
{
    public function index(){
        return view('web.welcome');
    }

    public function about(){
        return view('web.about-us');
    }

    public function sponsors(){
        return view('web.sponsors');
    }
}
