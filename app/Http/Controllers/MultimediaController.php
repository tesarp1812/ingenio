<?php

namespace App\Http\Controllers;

use App\Models\history_design;
use App\Models\respons_request_design;
use App\Models\type_design;
use App\Models\User;
use Illuminate\Http\Request;

class MultimediaController extends Controller
{
    //

    public function responDesign()
    {
        $user = user::get();
        $type_design = type_design::get();
        $sub_type_design = DB::('type_design')
        ->select('td.type AS type_td', 'td2.type AS type_td2');

        
    }
    public function inputResponsDesign(Request $request)
    {
        respons_request_design::created([
            'user_id' => $request->inputUser,
            'type_design_id' =>$request->inputTypeDesign,
            'size' => $request->inputSize,
            'duration'=> $request->inputDescription,
            'deadline' => $request->inputDeadline,
            'is_cito' => $request->inputCito,
            'whatsapp' => $request->inputWhatsapp,
            'status_id' => $request->inputStatus,
            'word_file_path' => $request->inputWord
        ]);

    }

    public function historyDesign(Request $request)
    {
        history_design::created([
            'respons_id' => $request->inputRespon,
            'user_id' => $request->inputUser,
            'description' => $request->inputDescription,
            'status_id' => $request->inputStatus
        ]);
    }
    
    

    
}
