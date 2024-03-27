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

    public function index()
    {
        $requests = respons_request_design::select(
            'users.name as name',
            'type_designs.type as type_td',
            'td2.type as type_td2',
            'respons_request_designs.size',
            'respons_request_designs.duration',
            'respons_request_designs.description',
            'respons_request_designs.deadline',
            'respons_request_designs.is_cito',
            'respons_request_designs.whatsapp',
            'status_designs.name as status_name',
            'respons_request_designs.word_file'
        )
            ->join('users', 'users.id', '=', 'respons_request_designs.user_id')
            ->join('type_designs', 'type_designs.id', '=', 'respons_request_designs.type_design_id')
            ->join('status_designs', 'status_designs.id', '=', 'respons_request_designs.status_id')
            ->leftJoin('type_designs as td2', 'td2.id', '=', 'type_designs.parent_type_id')
            ->get();
    
        //dd($requests);
        return view('multimedia.index');
    }

    public function responDesign()
    {
        $user = user::get();
        $type_design = type_design::get();
        $sub_type_design = DB::table('type_designs')
            ->leftJoin('type_designs as td2', 'type_designs.id', '=', 'td2.parent_type_id')
            ->select('td2.id', 'type_designs.type AS type_td', 'td2.type AS type_td2')
            ->whereNotNull('td2.id')
            ->get();
        //dd($sub_type_design);

        return view('multimedia.form_request_design', compact('user', 'type_design', 'sub_type_design'));
    }
    public function inputResponsDesign(Request $request)
    {
        //dd($request->all());

        // Validasi request
        $request->validate([
            'inputWord' => 'required|mimes:doc,docx|max:2048', // Sesuaikan dengan jenis file yang diperbolehkan dan ukuran maksimalnya
        ]);

        // Simpan file ke dalam folder multimedia-word di folder publik
        $file = $request->file('inputWord');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('multimedia-word', $fileName, 'public');

        respons_request_design::create([
            'user_id' => $request->inputUser,
            'type_design_id' => $request->inputTypeDesign,
            'size' => $request->inputSize,
            'duration' => $request->inputDuration,
            'description' => $request->inputDescription,
            'deadline' => $request->inputDeadline,
            'is_cito' => $request->inputCito,
            'whatsapp' => $request->inputWhatsapp,
            'status_id' => $request->inputStatus,
            'word_file' => $fileName
        ]);
        return redirect('/multimedia')->with('success', 'Input file dan upload berhasil.');
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
