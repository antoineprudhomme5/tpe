@extends('templates/app')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>The games list</h1>
            <p>Here, you can find all the games. By playing games, you can practise english and win points.</p>
        </div>
    </div>

    <div class="panel-group" id="accordion">
        @foreach($games as $game)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-target="#{{ $game->alias }}"
                           href="#collapseTwo" class="collapsed">
                            {{ $game->title }}
                        </a>
                    </h4>

                </div>
                <div id="{{ $game->alias }}" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="container">
                            <div class="fluid-row">
                                {!! $game->description !!}
                                <a href="{{ url('games', $game->alias) }}">
                                    <button class="btn btn-success">Play</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop

