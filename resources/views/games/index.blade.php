@extends('templates/app')

@section('style')
    {!! HTML::style('css/style.css') !!}
    {!! HTML::style('css/games/index.css') !!}
@stop

@section('title')
    Games
@stop

@section('content')
    <div class="app-content">

        <div class="jumbotron">
            <div class="container">
                <h1>The games list</h1>

                <p>Here, you can find all the games. By playing games, you can practise english and win points.</p>
            </div>
        </div>


        <div class="container">
            <div class="row form-group product-chooser">
                @foreach($games as $game)
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <a href="{{ url('/games', $game->alias) }}">
                            <div class="product-chooser-item">
                                <div class="game-title col-sm-4 col-md-12 col-lg-12">
                                    <h1>{{ $game->title }}</h1>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12 game-description">
                                    <span class="description">{!! $game->description  !!}</span>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@stop

@section('scripts')
    {!! HTML::script('js/games/index.js') !!}
@stop

