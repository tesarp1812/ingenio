<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    //
    public function registerOfficial()
    {
        return view('register.official');
    }

    public function addUser(Request $request)
    {

        //dd($request->all());
        User::create([
            'name' => $request->inputName,
            'email' => $request->inputEmail,
            'password' => $request->inputPass,
            'remember_token' => Str::random(10), 
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => $request->inputRole
        ]);
        return redirect('/dashboard');
    }
}
