<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
    {!! HTML::style('compass/stylesheets/styles.css') !!}
    {!! HTML::style('css/font-awesome.min.css') !!}
</head>
<body>
@include('templates.menu')

@if(auth()->guest())
    <!-- Home Page
    ==========================================-->
    <div id="tf-home" class="text-center">
        <div class="overlay">
            <div class="content">
                <h1>Welcome on <strong><span class="color">Engl'UTT</span></strong></h1>
                <p class="lead">To <strong>boldly</strong> learn like <strong>no man</strong> has learned <strong>before</strong></p>
                <button type="button" class="btn btn-login btn-lg" data-toggle="modal" data-target="#logIn">Log in</button>
            </div>
        </div>
    </div>
    <!-- Log In Modal -->
    <div class="modal fade" id="logIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Login</h4>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input(s).<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="modal-body">
                    <form class="text-right " action="{{ url('/auth/login') }}" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token">
                        {!! csrf_field() !!}
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="email" name="email" id="email" class="form-control js-focus" placeholder="Email address" value="{{ old('email') }}">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <a href="{{ url('/password/email') }}">Can't log in?</a>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Log in">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@else
    @include('home.loggedin')
@endif
@include('templates.footer')
<!-- scripts -->
{!! HTML::script('js/jquery.js') !!}
{!! HTML::script('bootstrap/js/bootstrap.min.js') !!}
</body>
</html>