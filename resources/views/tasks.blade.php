@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('messages.newtask')
            </div>
            <div class="panel-body">
                @include('common.errors')
                <form action="{{ route('task') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">@lang('messages.task')</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                        </div>
                    </div>
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
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('messages.currenttasks')
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
                                    <td class="table-text"><div><a href="{{ route('task_detail', ['id' => $task->id]) }}">{{ $task->name }}</a></div></td>
                                    <td>
                                        <form action="{{ route('delete_task', ['id' => $task->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>@lang('messages.delete')
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('task_detail', ['id' => $task->id]) }}" method="GET"> 
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-btn fa-eye"></i> @lang('messages.view')
                                            </button>
                                        </form>
                                    </td>                           
                                </tr>
                            @endforeach                   
                        </tbody>
                    @else
                        @lang('messages.notasknow')
                    @endif
                </table>
            </div>
        </div> 
    </div>
</div>
@endsection
