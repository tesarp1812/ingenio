<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\check_log;
use App\Models\task_work;
use Illuminate\Http\Request;

use function Laravel\Prompts\table;

class HumanResourseController extends Controller
{
    public function taskWork()
    {
        return view('hr.dialy_task');
    }

    public function storeTaskWork(Request $request)
    {
        //dd($request->all());
        task_work::create([
            'user_id' => $request->inputUser,
            'task' => $request->inputTask
        ]);
        
        return redirect('/task-work');
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

    public function checklog()
    {
        $checklog = DB::table('check_logs')
        ->select(
            'users.name',
            'check_logs.sign',
            'check_logs.created_at',
        )
        ->leftJoin('users', 'users.id', '=', 'check_logs.user_id')
        ->get();
        //dd($checklog);
        return view('hr.checklog', compact('checklog'));
    }
}
