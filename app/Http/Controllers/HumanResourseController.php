<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HumanResourseController extends Controller
{
    public function present()
    {
        return view('hr.present');
    }
}
