@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                @include('common.errors')
                <form action="{{ route('update_user', ['id' => $user->id]) }}" method="POST">
                    @csrf  
                    <label for="task-name" class="col-sm-1 control-label">@lang('messages.user')</label> 
                    <div class="col-sm-4">
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                    </div>
                    <button type="submit" class="btn btn-warning">
                        <i class="fa fa-btn fa-floppy-o"></i>@lang('messages.save')
                    </button>
                </form>
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    @if (count($tasks) > 0)
                        <thead>
                            <th>@lang('messages.task')</th>
                            <th>&nbsp;</th>
                        </thead>                 
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="table-text">
                                        <div>
                                            <a href="{{ route('task_detail', ['id' => $task->id]) }}">{{ $task->name }}</a>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ route('remove_task_user', ['id' => $user->id]) }}" method="GET">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="task_id" value="{{ $task->id }}">
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>@lang('messages.delete')
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                        @lang('messages.notaskinuser')
                    @endif
                </table>
                <form action="{{ route('add_task_list', ['id' => $user->id]) }}" method="GET" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>@lang('messages.addtask')
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
