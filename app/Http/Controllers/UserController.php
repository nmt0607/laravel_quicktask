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

}
