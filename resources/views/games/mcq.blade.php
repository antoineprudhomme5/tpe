@extends('templates/games')

@section('title')
    {{ $mcq[0]->name }}
@stop

@section('style')
    {!! HTML::style('css/style.css') !!}
@stop

@section('content')
    <div class="container app-content">

        <h1>{{ $mcq[0]->name }}</h1>

        <form method="post" action="{{ url("games/mcq", $mcq[0]->id) }}">

            {!! csrf_field() !!}

            <?php $i = 0; ?>

            @foreach($questions as $question)

                <div class="row">

                    <h2>{{ $question->question }}</h2>

                    <input type="hidden" name="{{ "q".$i }}" value={{ $question->id }} />

                        @foreach($question->answers as $a)
                            <div class="radio">
                                <label>
                                    <input type="radio" name="{{ "rep".$i }}" value="{{ $a->answer }}"> {{ $a->answer }}
                                </label>
                            </div>
                        @endforeach

                </div>

                <?php $i++; ?>

                <hr>

            @endforeach

            <button class="btn btn-success" type="submit">Go</button>

        </form>

    </div>
@stop

@section('scripts')

@stop