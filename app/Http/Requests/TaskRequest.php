<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:40|unique:tasks',
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => trans('messages.taskrequired'),
            'name.max' => trans('messages.taskmax'),
            'name.unique' => trans('messages.taskunique'),
        ];
    }
}
