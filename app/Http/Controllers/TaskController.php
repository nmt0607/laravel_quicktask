<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use DB;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks', [
            'tasks' => Task::orderBy('created_at', 'asc')->get(),
        ]);
    }

    public function store(TaskRequest $request) 
    {
        $task = $request->all();
        Task::create($task);

        return redirect()->route('task_list');
    }

    public function destroy($id)
    { 
        $task = Task::findOrFail($id);
        $task->users()->detach();
        $task->delete();

        return redirect()->route('task_list');
    }
}
