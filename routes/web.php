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
    Route::get('task-list', 'TaskController@index')->name('task_list');
    Route::get('task-detail/{id}', 'TaskController@taskDetail')->name('task_detail');
    Route::post('task', 'TaskController@store')->name('task');
    Route::delete('task/{id}', 'TaskController@destroy')->name('delete_task');
    Route::get('add-user-list{id}', 'TaskController@listUserCanAdd')->name('add_user_list');
    Route::post('add-user-task/{id}', 'TaskController@addUserToTask')->name('add_user_to_task');
    Route::delete('remove-user-task/{id}', 'TaskController@removeUserFromTask')->name('remove_user_task');
    Route::get('user-list', 'UserController@index')->name('user_list');
    Route::get('user-detail/{id}', 'userController@userDetail')->name('user_detail');
    Route::post('user', 'UserController@store')->name('user');
    Route::delete('user/{id}', 'UserController@destroy')->name('delete_user');
    Route::get('add-task-list/{id}', 'UserController@listTaskCanAdd')->name('add_task_list');
    Route::post('add-task-user/{id}', 'UserController@addTaskToUser')->name('add_task_user');
    Route::delete('remove-task-user/{id}', 'UserController@removeTaskFromUser')->name('remove_task_user');
  });
