@extends('templates/app')
@section('title')
    Games
@stop

@section('content')
<div class="container-fluid" id="hero">
    <div class="wrapper container games">
        <div class="page-header">
            <h1>Games list</h1>
        </div>
        <p>Here, you can find all the games. By playing games, you can practise english and win points.</p>

        @if(!empty($message))
            <div class="alert alert-success" role="alert">
                <b>Results : </b>
                {{ $message }}
            </div>
        @endif

        <div id="games-list">
            <div class="row">
                @foreach($games as $game)
                    <div class="col-xs-12 col-md-4">
                        <a href="{{ url('/games', $game->alias) }}">
                            <div class="panel panel-scheme">
                                <div class="panel-heading text-center"><h2>{{ $game->title }}</h2></div>
                                <div class="panel-body">
                                    {!! $game->description  !!}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                @foreach($mcq as $m)
                    <div class="col-xs-12 col-md-4">
                        <a href="{{ url('/games/mcq', $m->id) }}">
                            <div class="panel panel-scheme">
                                <div class="panel-heading text-center"><h2>{{ $m->name }}</h2></div>
                                <div class="panel-body">
                                    {{ $m->description }}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop