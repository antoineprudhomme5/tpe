<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='utf-8'/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
        {!! HTML::style('compass/stylesheets/styles.css') !!}
        @yield('style')
    </head>
    <body>
        @include('templates.menu_games')

        @section('content')
        @show

        @include('templates.footer')
                <!-- scripts -->
        {!! HTML::script('js/jquery.js') !!}
        {!! HTML::script('bootstrap/js/bootstrap.min.js') !!}
        @yield('scripts')
    </body>
</html>