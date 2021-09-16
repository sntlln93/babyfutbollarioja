<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class ShowRegulations extends Controller
{
    public function general()
    {
        return view('web.regulations.general');
    }
}
