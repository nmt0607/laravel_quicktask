<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use DB;

class UserController extends Controller {

    public function index() 
    {
        return view('users', [
            'users' => User::orderBy('created_at', 'asc')->get(),
        ]);
    }

    public function store(UserRequest $request) 
    {
        $user = $request->all();
        User::create($user);

        return redirect()->route('user_list');
    }

    public function destroy($id) 
    {        
        $user = User::findOrFail($id);
        $user->tasks()->detach();
        $user->delete();
        
        return redirect()->route('user_list');
    }

    public function userDetail($id) 
    {
        $user = User::find($id);
        if (isset($user)) {
            $taskBelongsTo = $user->tasks;

            return view('user_detail', [
                'user' => $user,
                'tasks' => $taskBelongsTo,
            ]);
        } else {
            return redirect()->route('user_list');
        }
    }

    public function edit($id) 
    {
        $user = User::find($id);
        if (isset($user)) {
            $taskBelongsTo = $user->tasks;

            return view('edit_user', [
                'user' => $user,
                'tasks' => $taskBelongsTo,
            ]);
        } else {
            return redirect()->route('user_list')->withErrors(trans('messages.usernotexist'));
        }
    }

    public function update($id,UserRequest $request) 
    {
        $user = User::find($id);
        if (isset($user)) {
            $user->update($request->all());
            $taskBelongsTo = $user->tasks;

            return view('user_detail', [
                'user' => $user,
                'tasks' => $taskBelongsTo,
            ]);
        } else {
            return redirect()->route('user_list')->withErrors(trans('messages.usernotexist'));
        }
    }

    public function listTaskCanAdd($id) 
    {
        $user = User::find($id);
        if (isset($user)) {
            $taskBelongsTo = $user->tasks;
            $task = Task::all();
            $taskDontBelongsTo = $task->diff($taskBelongsTo);

            return view('add_task_user', [
                'user' => $user,
                'tasks' => $taskDontBelongsTo,
            ]);
        } else {
            return redirect()->route('user_list')->withErrors(trans('messages.usernotexist'));
        }
    }

    public function addTaskToUser($id, Request $request) 
    {
        if (isset($request->task)) {
            $user = User::findOrFail($id);
            $user->tasks()->attach($request->task);

            return redirect()->route('user_detail', ['id' => $user->id]);
        } else
            return redirect()->route('user_detail', ['id' => $user->id]);
    }

    public function removeTaskFromUser($id, Request $request) 
    {
        $user = User::find($id);
        if (isset($user)) {
            $user->tasks()->detach($request->task_id);

            return redirect()->route('user_detail', ['id' => $user->id]);
        } else {
            return redirect()->route('user_list')->withErrors(trans('messages.usernotexist'));
        }
    }
}
