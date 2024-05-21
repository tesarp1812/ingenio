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

    public function index()
    {
        $checklog = DB::table('check_logs')
        ->select(
            'users.name',
            'check_logs.sign',
            'check_logs.created_at',
        )
        ->leftJoin('users', 'users.id', '=', 'check_logs.user_id')
        ->get();

        $dialyTask = DB::table('task_works')
        ->select(
            'users.name',
            'task_works.id',
            'task_works.task',
            'task_works.created_at'
            )
        ->leftJoin('users', 'users.id', '=', 'task_works.user_id')
        ->get();
        //dd($dialyTask);
        return view('hr.dashboard', compact('checklog', 'dialyTask'));
    }

    public function taskById($id)
    {

        $dialyTask = DB::table('task_works')
        ->select(
            'users.name',
            'task_works.id',
            'task_works.task',
            'task_works.created_at'
            )
        ->leftJoin('users', 'users.id', '=', 'task_works.user_id')
        ->where('task_works.id', $id)
        ->get();

        //dd($dialyTask);
        return view('hr.task', compact(' dialyTask'));
    }
}
