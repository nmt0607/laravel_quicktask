<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">     
        <title>@lang('messages.quicktask')</title>
        <link href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>
        <link href="{{ asset('bower_components/lato-font/css/lato-font.min.css') }}" rel="stylesheet">
        <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/mycss.css') }}" rel="stylesheet"> 
    </head>
    <body id="app-layout">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header" >
                    <div>
                        <a class="navbar-brand" href="{{ route('user_list') }}">
                            @lang('messages.userlist')
                        </a>
                        <a class="navbar-brand" href="{{ route('task_list') }}">
                            @lang('messages.tasklist')
                        </a>           
                        <a class="navbar-brand" href="{{ route('language', ['locale' => 'vi']) }}">
                            @lang('messages.vi')
                        </a>
                        <a class="navbar-brand" href="{{ route('language', ['locale' => 'en']) }}">
                            @lang('messages.en')
                        </a>
                    </div>                                      
                </div>
            </div>
        </nav>
        @yield('content')
        <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/myjs.js') }}"></script>
    </body>
</html>
