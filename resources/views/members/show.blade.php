@extends('templates.app')

@section('content')
    @include('partials.alerts.flash')
    <div class="container-fluid profile-theme" id="hero">
        <div class="wrapper container">
            <div class="block-header block-sm block scheme-white">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="user-username"><b>{{ ucfirst($user->firstname) }}</b> {{ ucfirst($user->name) }} <small class="user-label">Casual</small></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-xs-12 hidden-xs">
                    <div class="hidden-xs">
                        <div class="block scheme-white text-center">
                            @if ($user->avatar === '' || $user->avatar === null)
                                <img class="pic" src="{{ asset("/img/avatars/default_avatar.png") }}" alt="">
                            @else
                                <img class="avatar" src="{{ asset("/img/avatars") }}/{{$user->avatar}}" alt="">
                                <br>
                                <button type="button" class="btn btn-app-reverse btn-lg" data-toggle="modal" data-target="#addPicture">Modify</button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-xs-12">
                    <div class="visible-xs">
                        <div class="block text-center">
                            @if ($user->avatar === '' || $user->avatar === null)
                                <img class="pic" src="{{ asset("/img/avatars/default_avatar.png") }}" alt="">
                            @else
                                <img class="pic" src="{{ asset("/img/avatars") }}/{{Auth::user()->avatar}}" alt="">
                                <br>
                                <button type="button" class="btn btn-app-reverse btn-lg" data-toggle="modal" data-target="#addPicture">Modify</button>
                            @endif
                        </div>
                    </div>
                    <div class="block no-padding block-sm scheme-white">
                        <ul class="questions-answers">
                            @foreach($questions as $key => $q)
                                <li class="question-answer">
                                    <h3>{{$q->topic}}</h3>
                                    <p>{{$q->answer}}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
    {!! HTML::script('js/alert.js') !!}
@endsection
@endsection