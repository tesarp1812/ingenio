<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function registerOfficial()
    {
        return view('register.official');
    }
}
