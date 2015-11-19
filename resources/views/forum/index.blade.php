@extends('templates/app')

@section('style')
	{!! HTML::style('css/forum_index.css') !!}
@stop

@section('title')
    Forum
@stop

@section('content')
	<div class="container">
        <div class="row">
            <table class="table">
                <thead>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="{{ url('/forum/create') }}">
                            <button class="btn btn-success">New topic</button>
                        </a>
                    </td>
                </thead>
                <tbody>
                    @foreach ($topics as $topic)
                        <tr>
                            <td>{{ $topic->id }}</td>
                            <td>{{ $topic->title }}<br>by {{ $topic->user->name }}</td>
                            <td>
                                <a href="{{ url('/forum/show', $topic->id) }}"><button class="btn btn-primary">see</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> 
        </div> 
    </div>
@stop

@section('scripts')
	{!! HTML::script('js/forum_index.js') !!}
@stop
