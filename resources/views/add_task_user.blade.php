@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                @include('common.errors')
                @lang('messages.user'): {{ $user->name }}
            </div>
            @if (count($tasks) > 0)
                <div class="panel-body">
                    <form action="{{ route('add_task_user', ['id' => $user->id]) }}" method="POST">
                        @csrf                      
                        <table class="table table-striped task-table">
                            <thead>
                                <th>@lang('messages.task')</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="table-text"><div>{{ $task->name }}</div></td>
                                    <td><input type="checkbox" name="task[]" value="{{ $task->id }}" ></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-plus"></i>@lang('messages.addtask')
                        </button>
                        <input type="button" id="selectall" value="@lang('messages.selectall')"/>
                        <input type="button" id="unselectall" value="@lang('messages.unselectall')"/>
                    </form>
                </div>
            @else
                @lang('messages.notasktochoice')
            @endif
            <form action="{{ route('user_detail', ['id' => $user->id]) }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-btn fa-chevron-circle-left"></i>@lang('messages.back')
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
