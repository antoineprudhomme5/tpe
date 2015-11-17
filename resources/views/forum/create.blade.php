@extends('templates/app')

@section('title')
    Forum
@stop

@section('content')
	<form id="create-topic" action="{{ url('/forum/create') }}" method="post" role="form">
		{!! csrf_field() !!}

       	<div class="form-group">
       		<label for"subject">Subject</label>
            <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" value="{{ old('subject') }}">
        </div>

        <div class="form-group">
        	<label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" rows="3" value="{{ old('content') }}"></textarea>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <input type="submit" name="create" id="create" class="form-control btn btn-primary" value="Create Topic">
                </div>
            </div>
        </div>

    </form>
@stop