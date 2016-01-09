@extends('templates.app')

@section('content')
    @include('partials.alerts.flash')
    <div class="container-fluid profile-theme" id="hero">
        <div class="wrapper container">
            <div class="block-header block-sm block scheme-white">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="user-username"><b>{{ ucfirst(Auth::user()->firstname) }}</b> {{ ucfirst(Auth::user()->name) }} <small class="user-label">Casual</small></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-xs-12 hidden-xs">
                    <div class="hidden-xs">
                        <div class="block scheme-white text-center">
                            @if (Auth::user()->avatar === '' || Auth::user()->avatar === null)
                                <p>You haven't set any profile picture yet. Click below on <i>Add profile picture</i> to set one.</p>
                                <button type="button" class="btn btn-app-reverse btn-lg" data-toggle="modal" data-target="#addPicture">Add profile picture</button>
                            @else
                                <img class="avatar" src="{{ asset("/img/avatars") }}/{{Auth::user()->avatar}}" alt="">
                                <br>
                                <button type="button" class="btn btn-app-reverse btn-lg" data-toggle="modal" data-target="#addPicture">Modify</button>
                            @endif
                            <br><br>
                                <p>
                                    <b>
                                        {{Auth::user()->points}}
                                        @if(Auth::user()->points > 1)
                                            points
                                        @else
                                            point
                                        @endif
                                    </b>
                                </p>
                                <p>
                                    <b>
                                        {{$level->count()}}
                                        @if ($level->count() > 1)
                                            badges
                                        @else
                                            badge
                                        @endif
                                    </b>
                                </p>
                                <a href="{{url('achievements')}}">Achievements</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-xs-12">
                    <div class="visible-xs">
                        <div class="block text-center">
                            @if (Auth::user()->avatar === '' || Auth::user()->avatar === null)
                                <p>You haven't set any profile picture yet. Click below on <i>Add profile picture</i> to set one.</p>
                                <button type="button" class="btn btn-app-reverse btn-lg" data-toggle="modal" data-target="#addPicture">Add profile picture</button>
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
                        <div class="text-center">
                            <br>
                            <a class="btn btn-lg btn-app-reverse" href="{{url("/profile/about")}}" role="button">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addPicture" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Profile picture</h4>
                </div>
                {!! Form::open(
                        ['route' => 'profile.picture',
                         'files' => true
                         ]
                     )
                     !!}
                    <div class="modal-body">
                        <input type="file" name="avatar" id="avatar" required>
                    </div>
                    <div class="modal-footer">
                        {!! Form::submit('Save', ['class' => 'btn btn-app-reverse']) !!}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                {!! Form::close() !!}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @section('scripts')
        {!! HTML::script('js/alert.js') !!}
    @endsection
@endsection