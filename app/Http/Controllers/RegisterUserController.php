<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function create()
    {

        return view('auth.register');
    }

    public function store(Request $request)
    {

        dd("Todo"); 
        //Auth 
        /* $request->validate([
            'name' => ['required', 'min:5'],
            'email' => ['required', 'unique'],
            'password' => ['required', 'min:6', 'max:32']
        ]); */
    }
}
