<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
        $sub_type_design = DB::table('type_designs')
        ->leftJoin('type_designs as td2', 'type_designs.id', '=', 'td2.parent_type_id')
        ->select('type_designs.id','type_designs.type AS type_td', 'td2.type AS type_td2')
        ->whereNotNull('td2.id')
        ->get();
        //dd($sub_type_design);

        return view('multimedia.form_request_design', compact('user','type_design','sub_type_design'));
        
    }
    public function inputResponsDesign(Request $request)
    {
        //dd($request->all());
        return $request->file('inputWord')->store('multimedia-word');
        respons_request_design::created([
            'user_id' => $request->inputUser,
            'type_design_id' =>$request->inputTypeDesign,
            'size' => $request->inputSize,
            'duration'=> $request->inputDuration,
            'description'=> $request->inputDescription,
            'deadline' => $request->inputDeadline,
            'is_cito' => $request->inputCito,
            'whatsapp' => $request->inputWhatsapp,
            'status_id' => $request->inputStatus
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
