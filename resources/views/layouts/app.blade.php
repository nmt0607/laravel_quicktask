<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">     
        <title>@lang('messages.quicktask')</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
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
                    </div>                   
                </div>
            </div>
        </nav>
        @yield('content')
        <script type="text/javascript" src="{{ asset('js/myjs.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>
