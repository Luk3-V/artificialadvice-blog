<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function create() {
        return view('register.create');
    }

    public function store() {
        $attributes = request()->validate([
            'username'=>'required|max:255|min:3|unique:users,username',
            'email'=>'required|email|max:255|unique:users,email',
            'password'=>'required|max:255|min:7',
            //'confirm_password'=>'required|max:255|min:7',
            'avatar'=>'required|image'
        ]);

        // if($attributes['password'] !== $attributes['confirm_password']){
        //     // auth failed
        //     throw ValidationException::withMessages(['password' => "Passwords dont match"]);
        // }

        $attributes['avatar'] = request()->file('avatar')->store('avatars');

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success', 'Account has been created!');
    }
}
