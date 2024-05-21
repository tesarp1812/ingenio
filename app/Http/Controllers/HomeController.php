<?php

namespace App\Http\Controllers;

use App\Models\role;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        $role = role::get();
        //dd($role);
        return view('dashboard', compact('role'));
    }

    public function resetSession()
    {
        session()->flush(); // This clears all session data
        session()->regenerate(); // This regenerates the session ID

        // Optionally, you can put some data back into the session if needed
        session(['key' => 'value']);

        return redirect()->back(); // Redirect to the previous page or any other desired location
    }
}
