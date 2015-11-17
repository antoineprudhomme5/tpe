<!DOCTYPE html>
<html lang='en'>
	<head>
		<meta charset='utf-8'/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title')</title>
		{!! HTML::style('bootstrap/css/bootstrap.css') !!}
		{!! HTML::style('css/style.css') !!}
		@yield('style')
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
	      	<div class="container-fluid">
		        <div class="navbar-header">
		          	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
		          	</button>
		          	<a class="navbar-brand" href="#">Engl'UTT</a>
		        </div>
		        <div id="navbar" class="navbar-collapse collapse">
		          	<ul class="nav navbar-nav navbar-right">
			            <li><a href="{{ url('/auth/login') }}">Login</a></li>
			            <li><a href="{{ url('/auth/register') }}">Register</a></li>
			            <li><a href="{{ url('/forum') }}">Forum</a></li>
		          	</ul>
		        </div>
		    </div>
	    </nav>
	    <div class="container" id="content">
	    	<br>
			@yield('content')
		</div>
	</body>
	<!-- scripts -->
    {!! HTML::script('js/jquery.js') !!}
    {!! HTML::script('bootstrap/js/bootstrap.min.js') !!}
    @yield('scripts')
</html>