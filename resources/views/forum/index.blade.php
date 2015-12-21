@extends('templates/app')

@section('style')
    {!! HTML::style('css/style.css') !!}
@stop

@section('title')
    Forum
@stop

@section('content')
	<div class="app-content">

        <div class="jumbotron">
            <div class="container">
                <h1>Welcome to the forum !!</h1>
                <p>Here, you can discuss of what you want with all the users. To do that, you can create a new topic,
                    or join a existing conversation by adding a new comment.
                </p>
                <p>
                    <a class="btn btn-success btn-lg" href="{{ url('/forum/create') }}" role="button">
                        Create a new topic
                    </a>
                </p>
            </div>
        </div>

        <div class="container">
            <table class="table table-condensed table-hover">
                @foreach ($topics as $topic)
                    <tr>
                        <td>{{ $topic->id }}</td>
                        <td>By <strong>{{ $topic->user->firstname }} {{ $topic->user->name }}</strong></td>
                        <td><span class="label pull-right"></span></td>
                        <td><strong>{{ $topic->title }}</strong></td>
                        <td>{{ $topic->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ url('/forum/show', $topic->id) }}">
                                <button class="btn btn-primary">see</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
@endsection
