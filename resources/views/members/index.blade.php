@extends('templates.app')

@section('content')
    @include('partials.alerts.flash')
    <div class="profile-theme" id="hero">
        <div class="wrapper">
            <div class="container">
                <div class="block-header block-sm block scheme-white">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2><b>Community</b></h2>
                        </div>
                    </div>
                </div>
                <div class="results">
                    @foreach($users as $u)
                        <div class="user">
                            <div class="user-left">
                                <h4><a href="/{{$u->firstname}}/{{$u->user_id}}">{{$u->firstname}}</a></h4>
                                <div>
                                    @if($u->avatar === null || $u->avatar === '')
                                        <img class="pic" src="{{asset('img/avatars/default_avatar.png')}}" alt="">
                                    @else
                                        <img class="pic" src="{{asset('img/avatars')}}/{{$u->avatar_sm}}" alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="user-right">
                                <div class="user-body">
                                    <h6>About myself</h6>
                                    <p>{{$u->answer}}</p>
                                </div>
                            </div>
                            <a href="{{url('/members/'.$u->firstname)}}/{{$u->user_id}}" class="panel-link"></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@section('scripts')
    {!! HTML::script('js/alert.js') !!}
@endsection
@endsection