<!-- Navigation
    ==========================================
-->
<nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle menu -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">Engl' UTT</a>
        </div>

        <!-- Collect the nav links for toggling -->
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                @if(auth()->guest())
                    {{--<li><a href="{{ url('/') }}" class="page-scroll" data-toggle="modal" data-target="#logIn"><i class="fa fa-user"></i> Home</a></li>
                    <li><a href="#" class="page-scroll" data-toggle="modal" data-target="#logIn"><i class="fa fa-users"></i> Members</a></li>
                    <li><a href="#" class="page-scroll" data-toggle="modal" data-target="#logIn"><i class="fa fa-comment"></i> Chat</a></li>--}}
                @else
                    <li><a href="{{ url('/') }}" class="page-scroll"><i class="fa fa-user"></i> Home</a></li>
                    <li><a href="{{ url('/games') }}" class="page-scroll"><i class="fa fa-gamepad"></i> Exercises</a></li>
                    <li><a href="#" class="page-scroll"><i class="fa fa-users"></i> Members</a></li>
                    <li><a href="#" class="page-scroll"><i class="fa fa-comment"></i> Chat</a></li>
                    <li><a href="{{ url('/forum') }}" class="page-scroll"><i class="fa fa-comments-o"></i> Forum</a></li>
                    @if(Auth::user()->category_id == 1)
                        <li><a href="{{ url('/administration') }}" class="page-scroll"><i class="fa fa-cogs"></i> Admin</a></li>
                    @endif
                @endif
            </ul>
            @if(!auth()->guest())
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><i class="fa fa-question"></i> Help</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ucfirst(Auth::user()->firstname)}}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/profile') }}"><i class="fa fa-pencil-square-o"></i> Profile</a></li>
                        <li><a href="{{ url('/achievements') }}"><i class="fa fa-trophy"></i> Achievements</a></li>
                        <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out"></i> Log out</a></li>
                    </ul>
                </li>
            </ul>
            @endif
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>