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
                    <tr>
                        <td>3</td>
                        <td>My super cool Subject<br>Michel</td>
                        <td>
                            <button class="btn btn-primary">see</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Topic subject<br>Antoine p</td>
                        <td>
                            <button class="btn btn-primary">see</button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>i speak for nothing<br>Jacques</td>
                        <td>
                            <button class="btn btn-primary">see</button>
                        </td>
                    </tr>
                </tbody>
            </table> 
        </div> 
    </div>
@stop

@section('scripts')
	{!! HTML::script('js/forum_index.js') !!}
@stop