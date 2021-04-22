<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class ResetPasswordController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetForm()
    {
        return view('auth.passwords.reset');
    }

    public function reset(Request $request)
    {
        Auth::user()->update([
            'password' => Hash::make($this->validatedPassword($request))
        ]);

        return redirect($this->redirectTo);
    }

    private function validatedPassword($request)
    {
        return $request->validate([
            'password' => 'required|confirmed'
        ])['password'];
    }
}
