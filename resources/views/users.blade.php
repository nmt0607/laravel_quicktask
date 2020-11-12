@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('messages.newuser')
            </div>
            <div class="panel-body">
                @include('common.errors')
                <form action="{{ route('user') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="user-name" class="col-sm-3 control-label">@lang('messages.user')</label>
                        <div class="col-sm-6">
                            <input type="text" name="name"  class="form-control" value="{{ old('user') }}">
                        </div>
                    </div>
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
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('messages.currentusers')
            </div>
            <div class="panel-body">
                <table class="table table-striped user-table">
                    @if (count($users) > 0)
                        <thead>
                            <th>@lang('messages.user')</th>
                            <th>&nbsp;</th>
                        </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="table-text"><div><a href="{{ route('user_detail', ['id' => $user->id]) }}">{{ $user->name }}</a></div></td>
                                <td>
                                    <form action="{{ route('delete_user', ['id' => $user->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>@lang('messages.delete')
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('user_detail', ['id' => $user->id]) }}" method="GET">
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
                        @lang('messages.nousernow')
                    @endif
                </table>
            </div>
        </div>     
    </div>
</div>
@endsection
