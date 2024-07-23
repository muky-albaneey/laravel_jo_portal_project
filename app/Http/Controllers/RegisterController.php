<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
       $valAttr = request()->validate([
            'first_name' => ['required', 'min:2'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'password' =>['required','confirmed', Password::min(3)->letters()->numbers()->max(25)],
        ]);

        $user = User::create($valAttr);

        Auth::login($user);

        return redirect('/jobs');
    }
}
