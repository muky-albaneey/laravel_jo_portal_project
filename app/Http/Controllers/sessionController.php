<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class sessionController extends Controller
{
   public function create()
   {
    return view('auth.login');
   }

   public function store()
   {
    $valAtrr = request()->validate([
        'email'=> ['required', 'email'],
        'password' => ['required']
    ]);

    if(! Auth::attempt($valAtrr)){
        throw ValidationException::withMessages([
            'email' => 'the credentials are invalid!'
        ]);
    }

    request()->session()->regenerate();

    return redirect('/jobs');
   }

   public function destroy()
   {
        Auth::logout();
        return redirect('/');
   }
   
}
