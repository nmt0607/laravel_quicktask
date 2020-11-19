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
    
    public function taskDetail($id) 
    {      
        $task = Task::find($id);
        if (isset($task)) {
            $userBelongsTo = $task->users;

            return view('task_detail', [
                'task' => $task,
                'users' => $userBelongsTo,
            ]);
        } else {
            return redirect()->back()->withErrors(trans('messages.tasknotexist'));
        }
    }

    public function edit($id) 
    {
        $task = Task::find($id);
        if (isset($task)) {
            $userBelongsTo = $task->users;
            
            return view('edit_task', [
                'task' => $task,
                'users' => $userBelongsTo,
            ]);
        } else {
            return redirect()->back()->withErrors(trans('messages.tasknotexist'));
        }
    }

    public function update($id,TaskRequest $request) 
    {
        $task = Task::find($id);     
        if (isset($task)) {
            $task->update($request->all());
            $userBelongsTo = $task->users;

            return view('task_detail', [
                'task' => $task,
                'users' => $userBelongsTo,
            ]);
        } else {
            return redirect()->route('task_list')->withErrors(trans('messages.tasknotexist'));
        }
    }

    public function listUserCanAdd($id) 
    {
        $task = Task::find($id);
        if (isset($task)) {
            $userBelongsTo = $task->users;
            $user = User::all();
            $userDontBelongsTo = $user->diff($userBelongsTo);

            return view('add_user_task', [
                'task' => $task,
                'users' => $userDontBelongsTo,
            ]);
        } else {
            return redirect()->route('task_list')->withErrors(trans('messages.tasknotexist'));
        }
    }

    public function addUserToTask($id, Request $request)
    {
        if (isset($request->user)) {
            $task = Task::find($id);
            $task->users()->attach($request->user);

            return redirect()->route('task_detail', ['id' => $task->id]);
        } else
            return redirect()->route('task_detail', ['id' => $task->id]);
    }

    public function removeUserFromTask($id, Request $request) 
    {
        $task = Task::find($id);
        if (isset($task)) {
            $task->users()->detach($request->user_id);

            return redirect()->route('task_detail', ['id' => $task->id]);
        } else {
            return redirect()->route('task_list')->withErrors(trans('messages.tasknotexist'));
        }
    }
}
