<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\history_design;
use App\Models\respons_request_design;
use App\Models\task_design;
use App\Models\type_design;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class MultimediaController extends Controller
{
    //

    public function index()
    {
        $requests = DB::table('respons_request_designs')
            ->select(
                'respons_request_designs.id',
                'users.name',
                'parent_type.type as type1',
                'type_designs.type as type2',
                'respons_request_designs.size',
                'respons_request_designs.duration',
                'respons_request_designs.description',
                'respons_request_designs.deadline',
                'respons_request_designs.whatsapp',
                'status_designs.name as status',
                'respons_request_designs.word_file',
                'respons_request_designs.is_cito'
            )
            ->join('users', 'users.id', '=', 'respons_request_designs.user_id')
            ->join('status_designs', 'status_designs.id', '=', 'respons_request_designs.status_id')
            ->join('type_designs', 'type_designs.id', '=', 'respons_request_designs.type_design_id')
            ->leftJoin('type_designs as parent_type', 'type_designs.parent_type_id', '=', 'parent_type.id')
            ->orderBy('respons_request_designs.is_cito')
            ->paginate(10);

        $users = User::select('users.id', 'users.name')
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->where('roles', '=', 'Multimedia')
            ->get();

        //dd($user);

        //dd($requests);
        return view('multimedia.index', compact('requests', 'users'));
    }

    public function downloadFile($filename)
    {
        $file = storage_path('app/public/multimedia-word/' . $filename);

        return response()->download($file);
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

    public function updateStatusDesign(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $updateStatusDesign = respons_request_design::find($id);
            $updateStatusDesign->status_id = $request->updateStatus;
            $updateStatusDesign->save();

            // Debugging the input values

            history_design::create([
                'respons_id' => $request->inputRespon,
                'user_id' => $request->inputUser,
                'description' => $request->inputDescription,
                'status_id' => $request->inputStatus
            ]);

          dd($request->all());

            task_design::create([
                'respons_id' => $request->inputTaskRespon,
                'user_id' => $request->inputTaskUser,
            ]);

            DB::commit();

            return redirect('/multimedia')
                ->with('success_process', 'Request Design Diproses')
                ->with('success_accepted', 'Status berubah menjadi Accepted');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal memproses request design: ' . $e->getMessage());
        }
    }

    public function taskDesign()
    {
        $users = user::get();
        $taskDesign = DB::table('task_designs')
            ->select(
                'users.name as user_name',
                'parent_type.type as type1',
                'type_designs.type AS type2',
                'respons_request_designs.size',
                'respons_request_designs.duration',
                'respons_request_designs.description',
                'respons_request_designs.deadline',
                'respons_request_designs.whatsapp',
                'respons_request_designs.word_file',
                'status_designs.name as status',
                'respons_request_designs.id as respons_id'
            )
            ->join('users', 'users.id', '=', 'task_designs.user_id')
            ->join('respons_request_designs', 'respons_request_designs.id', '=', 'task_designs.respons_id')
            ->leftJoin('status_designs', 'status_designs.id', '=', 'respons_request_designs.status_id')
            ->leftJoin('type_designs', 'type_designs.id', '=', 'respons_request_designs.type_design_id')
            ->leftJoin('type_designs as parent_type', 'type_designs.parent_type_id', '=', 'parent_type.id')
            ->get();

        //dd($taskDesign);
        return view('multimedia.task_design', compact('taskDesign', 'users'));
    }

    public function updateTaskDesign(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $updateStatusDesign = respons_request_design::find($id);
            $updateStatusDesign->status_id = $request->updateStatus;
            $updateStatusDesign->save();

            history_design::create([
                'respons_id' => $request->inputRespon,
                'user_id' => $request->inputUser,
                'description' => $request->inputDescription,
                'status_id' => $request->inputStatus
            ]);

            DB::commit();

            return redirect('/multimedia/task')
                ->with('success_accepted', 'Status berubah menjadi Accepted');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal memproses request design: ' . $e->getMessage());
        }
    }
}
