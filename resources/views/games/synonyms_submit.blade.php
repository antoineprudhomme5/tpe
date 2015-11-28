@extends('templates/app')

@section('style')
    {!! HTML::style('css/synonyms_submit.css') !!}
@stop

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>Results</h1>
            <p>You win {{ $points }} points !!</p>
            <p class="pull-right">
                <a class="btn btn-primary btn-lg" href="{{ url('games') }}" role="button">Go to games</a>
                <a class="btn btn-success btn-lg" href="{{ url('games/synonyms') }}" role="button">Replay</a>
            </p>
        </div>
    </div>

    <div class="pricing-table pricing-three-column row">
        @foreach($results as $result)
            <div class="plan col-sm-3 col-lg-3">
                <div class="plan-name-gold">
                    <h2>{{ $result['word'] }}</h2>
                </div>
                <ul>
                    <li class="plan-feature">
                        <b>you chose : </b> {{ $result['choice'] }}
                    </li>
                    <li class="plan-feature">
                        <b>the response : </b> {{ $result['response'] }}
                    </li>
                    <li class="plan-feature">
                        @if($result['valid'])
                            <span class="glyphicon glyphicon-ok valid gi-2x" aria-hidden="true"></span>
                        @else
                            <span class="glyphicon glyphicon-remove invalid gi-2x" aria-hidden="true"></span>
                        @endif
                    </li>
                </ul>
            </div>
        @endforeach
    </div>
@stop