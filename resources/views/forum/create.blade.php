@extends('templates/app')

@section('title')
    Forum
@stop

@section('content')<!--
	<form id="create-topic" action="{{ url('/forum/create') }}" method="post" role="form" class="vertical-form">
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
            <input type="submit" name="create" id="create" class="form-control btn btn-primary" value="Create Topic">
        </div>-->
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" id="create-topic" action="{{ url('/forum/create') }}" method="post">
                    <fieldset>
                        <legend class="text-center">Create new topic</legend>

                        {!! csrf_field() !!}
                
                        <!-- subject input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="title">Subject</label>
                            <div class="col-md-9">
                                <input id="title" name="title" type="text" placeholder="subject" class="form-control" value="{{ old('title') }}">
                            </div>
                        </div>
                
                        <!-- Message body -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="content">Your topic</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="content" name="content" placeholder="Please enter your message here..." rows="5" value="{{ old('content') }}"></textarea>
                            </div>
                        </div>
                
                        <!-- Form actions -->
                        <div class="form-group">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>

@stop