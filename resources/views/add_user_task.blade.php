@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                @include('common.errors')
                @lang('messages.task'): {{ $task->name }}
            </div>
            @if (count($users) > 0)
                <div class="panel-body">
                    <form action="{{ route('add_user_task', ['id' => $task->id]) }}" method="POST">
                        @csrf                        
                        <table class="table table-striped task-table">
                            <thead>
                                <th>@lang('messages.user')</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="table-text"><div>{{ $user->name }}</div></td>
                                    <td><input type="checkbox" name="user[]" value="{{ $user->id }}" ></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-plus"></i>@lang('messages.adduser')
                        </button>
                        <input type="button" id="selectall" value="@lang('messages.selectall')"/>
                        <input type="button" id="unselectall" value="@lang('messages.unselectall')"/>
                    </form>                       
                </div>
            @else
                @lang('messages.nousertochoice')
            @endif
            <form action="{{ route('task_detail', ['id' => $task->id]) }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-btn fa-chevron-circle-left"></i>@lang('messages.back')
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
