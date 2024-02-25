<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Task::with('getUser')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = new Task;
        $task->user_id = $request->user_id;
        $task->task = $request->task;

        $task->save();

        return response()->json([
            'task' => $task,
            'status' => '1',
            'message' =>'successfully created a task'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Task $task)
    {       
        $task->id = $request->task_id;
        $task->status = $request->status;

        $task->save();

        return response()->json([
            'task' => $task,
            'status' => '1',
            'message' =>'Marked task as '.($task->status)
        ]);   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
