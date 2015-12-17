@extends('administration.skeleton')

@section('wrapper')
    @include('partials.alerts.flash')
    @parent

@section('style')
    <style>
        .img-speakabout-admin
        {
            width: 300px;
            height: auto;
        }
    </style>
@stop

@section('pageTitle')
    <h1>Speak-About Game <small>Here you can manage the data from the database easily.</small></h1>
@endsection

@section('content')

    {!! HTML::style('css/admin/form') !!}

    @if($speakAbouts->isEmpty())
        <div class="text-center">
            <h2>It looks like there is no data for this game.</h2>
            <h3>Add new topic for the speak about game with the form below.</h3>
        </div>
    @else
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Overview</th>
                <th>Link</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($speakAbouts as $speakAbout)
                <tr>
                    <td>
                        @if($speakAbout->type == 'img')
                            <img src="{{ asset($speakAbout->link) }}" class="img-responsive img-speakabout-admin"/>
                        @elseif($speakAbout->type == 'audio')
                            <audio controls>
                                <source src="{{ asset($speakAbout->link) }}" type="audio/mpeg">
                            </audio>
                        @else
                            Type error
                        @endif
                    </td>
                    <td>{{ $speakAbout->link }}</td>
                    <td class="pull-right">
                        <form method="post" action="{{ url('administration/games/speak_about/remove', $speakAbout->id) }}">
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-remove"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-center">
            {!! $links !!}
        </div>
    @endif

    <div class="row">
        <div class="container">
            <form class="form-horizontal" method="post" action="{{ url('administration/games/synonym/store') }}">
                {!! csrf_field() !!}
                <div class="input-group">
                    <span class="input-group-addon" id="word">
                        <i class="fa fa-pencil"></i>
                    </span>
                    <input type="text" class="form-control" name="word" placeholder="Word" aria-describedby="word">
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon" id="p1">
                                <i class="fa fa-hashtag"></i>
                            </span>
                            <input type="text" class="form-control" name="p1" placeholder="Option 1" aria-describedby="p1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon" id="p1">
                                <i class="fa fa-hashtag"></i>
                            </span>
                            <input type="text" class="form-control" name="p2" placeholder="Option 2" aria-describedby="p2">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon" id="p2">
                                <i class="fa fa-hashtag"></i>
                            </span>
                            <input type="text" class="form-control" name="p3" placeholder="Option 3" aria-describedby="p3">
                        </div>
                    </div>
                </div>

                <div class="input-group">
                    <span class="input-group-addon" id="response">
                        <i class="fa fa-check"></i>
                    </span>
                    <input type="text" class="form-control" name="response" placeholder="Response" aria-describedby="response">
                </div>

                <div class="input-group">
                    <button type="submit" class="btn btn-success">Store</button>
                </div>
            </form>
        </div>
    </div>

@endsection
@endsection
