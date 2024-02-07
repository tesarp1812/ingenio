<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
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
