<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
    {!! HTML::style('css/admin/bootstrap.min.css') !!}
    {!! HTML::style('css/admin/AdminLTE.min.css') !!}
    {!! HTML::style('css/admin/skins/skin-blue.min.css') !!}
    {!! HTML::style('css/font-awesome.min.css') !!}
    @yield('style')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- Header navigation
        ==========================================
        -->
        <header class="main-header">
            <!-- Logo -->
            <a href="{{route('administration')}}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b>UTT</span>
            </a>

            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
            </nav>
        </header>
        <!-- Aside navigation
            ==========================================
        -->
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        @if(Auth::user()->avatar === null || Auth::user()->avatar === '')
                            <img class="img-circle" src="{{asset('img/avatars/default_avatar.png')}}" alt="">
                        @else
                            <img class="img-circle" src="{{asset('img/avatars')}}/{{Auth::user()->avatar_sm}}" alt="">
                        @endif
                    </div>
                    <div class="pull-left info">
                        <p>{{ ucfirst(Auth::user()->firstname) }} {{ ucfirst(Auth::user()->name) }}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="{{ route('administration.news.index') }}">
                            <i class="fa fa-newspaper-o"></i>
                            <span>News</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('administration/games') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>Games</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('administration/mcq') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>MCQ</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>
    <!-- Content wrapper
    ==========================================
    -->
    @section('wrapper')
            <div class="content-wrapper">
                <section class="content-header">
                    @yield('pageTitle')
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            @section('content')
                                <div class="text-center">
                                    <h1>Welcome to the administration section</h1>
                                    <h4>You are free to add news and manage the games</h4>
                                </div>
                            @show
                        </div>
                    </div>
                </section>
            </div>
    @show
    </div>
    <!-- scripts -->
    {!! HTML::script('js/jquery.js') !!}
    {!! HTML::script('bootstrap/js/bootstrap.min.js') !!}
    {!! HTML::script('js/app.min.js') !!}
    {!! HTML::script('js/alert.js') !!}
    @yield('scripts')
</body>
</html>