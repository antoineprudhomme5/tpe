@extends('templates/app')

@section('style')
    {!! HTML::style('css/style.css') !!}
@stop

@section('title')
    Forum
@stop

@section('content')
	<div class="container-fluid" id="hero">
        <div class="wrapper container">
            <div class="page-header">
                <h1>Welcome to the forum</h1>
            </div>
            <p>Here, you can discuss about what you want with all the members. To do so, you can create a new topic,
                or join a existing conversation by adding a new comment.
            </p>
            <p>
                <a class="btn btn-app-reverse btn-lg" href="{{ url('/forum/create') }}" role="button">Create a new topic</a>
            </p>
            <div class="row">
                <div class="col-xs-12">
                    <div class="topics-list">
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
                                            <button class="btn btn-app-reverse">see</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
