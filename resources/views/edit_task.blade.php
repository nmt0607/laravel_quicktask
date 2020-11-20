@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                @include('common.errors')
                <form action="{{ route('update_task', ['id' => $task->id]) }}" method="POST">
                    @csrf  
                    <label for="task-name" class="col-sm-1 control-label">@lang('messages.task')</label> 
                    <div class="col-sm-4">
                        <input type="text" name="name" class="form-control" value="{{ $task->name }}">
                    </div>
                    <button type="submit" class="btn btn-warning">
                        <i class="fa fa-btn fa-floppy-o"></i>@lang('messages.save')
                    </button>
                </form>
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    @if (count($users) > 0)
                        <thead>
                            <th>@lang('messages.user')</th>
                            <th>&nbsp;</th>
                        </thead>             
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="table-text">
                                        <div>
                                            <a href="{{ route('user_detail', ['id' => $user->id]) }}">{{ $user->name }}</a>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ route('remove_user_task', ['id' => $task->id]) }}" method="GET">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>@lang('megsages.delete')
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                        @lang('messages.nouserintask')
                    @endif
                </table>
                <form action="{{ route('add_user_list', ['id' => $task->id]) }}" method="GET" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>@lang('messages.adduser')
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
