@extends('templates/app')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>The games list</h1>
            <p>Here, you can find all the games. By playing games, you can practise english and win points.</p>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">List of games</h3>
        </div>
        <ul class="list-group">
            @foreach($games as $game)
            <li class="list-group-item">
                <div class="row toggle" id="dropdown-detail-1" data-toggle="detail-1">
                    <div class="col-xs-10">
                        {{ $game->title }}
                    </div>
                    <div class="col-xs-2"><span class="glyphicon glyphicon-menu-down pull-right" aria-hidden="true"></span></div>
                </div>
                <div id="detail-1">
                    <hr></hr>
                    <div class="container">
                        <div class="fluid-row">
                            {{ $game->description }}
                            <a href="{{ url('games', $game->alias) }}">
                                <button class="btn btn-success">Play</button>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
@stop

@section('scripts')
    {!! HTML::script('js/games_list.js') !!}
@stop