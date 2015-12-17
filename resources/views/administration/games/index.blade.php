@extends('administration.skeleton')
@section('wrapper')
    @include('partials.alerts.flash')
    @parent
@section('pageTitle')
    <h1>Games <small>preview of the games</small></h1>
@endsection
@section('content')

    @if($games->isEmpty())
        <div class="text-center">
            <h2>It looks like there is no games.</h2>
            <h3>Contact the webmaster to have more informations.</h3>
        </div>
    @else
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Actions</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($games as $game)
                    <tr>
                        <td>{{ $game->id }}</td>
                        <td>
                            <a href="{{ url('administration/games/data', $game->alias) }}">
                                <button class="btn btn-primary">
                                    <i class="fa fa-edit"> </i>
                                    Data managing
                                </button>
                            </a>
                            @if($game->alias == 'speak_about')
                            <a href="{{ url('administration/games/evaluate', $game->alias) }}">
                                <button class="btn btn-success">
                                    <i class="fa fa-star"> </i>
                                    Grade students
                                </button>
                            </a>
                            @endif
                        </td>
                        <td>{{ $game->title }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
@endsection