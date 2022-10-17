<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create() {
        return view('sessions.create');
    }

    public function store() {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // attempt auth & login if success
        if(!auth()->attempt($attributes)){
            // auth failed
            throw ValidationException::withMessages(['email' => "Couldn't verify your credentials."]);
        }

        session()->regenerate();
        return redirect('/')->with('success', 'Signed in!');
    }

    public function destroy() {
        auth()->logout();

        return redirect('/')->with('success', 'Signed out!');
    }
}
