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
    {!! HTML::style('css/dragdrop.css') !!}
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

    <meta name="csrf-token" content="{{ csrf_token() }}"/> <!-- token ajax request -->

    <div class="row">
        <div class="container">
            <form class="form-horizontal" id="upload-form">
                <h4>Drag the file below</h4>

                <div class="upload-drop-zone" id="drop-zone">
                    Just drag and drop your file here.
                </div>
            </form>
        </div>
    </div>

@endsection
@endsection

@section('scripts')
    {!! HTML::script('js/speakabout-admin.js') !!}
@stop
