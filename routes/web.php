<?php

use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */


Route::group(['middleware' => ['web']], function () {
    Route::get('taskList','TaskController@taskList');
    Route::get('taskDetail/{id}','TaskController@taskDetail');
    Route::post('task','TaskController@addNewTask');
    Route::delete('task/{id}','TaskController@deleteTask');
    Route::get('listUserCanAdd/{id}','TaskController@listUserCanAdd');
    Route::get('addUserToTask/{id}', 'TaskController@addUserToTask');
    Route::get('removeUserFromTask/{id}','TaskController@removeUserFromTask');
    Route::get('userList','UserController@userlist');
    Route::get('userDetail/{id}','userController@userDetail');
    Route::post('user','UserController@addNewUser');
    Route::delete('user/{id}','UserController@deleteUser');
    Route::get('listTaskCanAdd/{id}','UserController@listTaskCanAdd');
    Route::get('listTaskCanAdd/{id}','UserController@listTaskCanAdd');
    Route::get('addTaskToUser/{id}', 'UserController@addTaskToUser');
    Route::get('removeTaskFromUser/{id}','UserController@removeTaskFromUser');
});
