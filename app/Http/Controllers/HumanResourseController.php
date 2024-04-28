<?php

namespace App\Http\Controllers;

use App\Models\check_log;
use Illuminate\Http\Request;

class HumanResourseController extends Controller
{
    public function taskWork()
    {
        return view('hr.present');
    }

    public function storeTaskWork()
    {
        
    }

    public function clocklog(Request $request)
    {
        //dd($request->all());
        check_log::create([
            'user_id' => $request->inputUser,
            'sign' => $request->inputSign,
            'desc' => $request->inputDesc,
        ]);

        return redirect('dashboard');
    }

    
}
