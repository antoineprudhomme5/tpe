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
                <h1>Create a new topic</h1>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <form id="create-topic" action="{{ url('/forum/create') }}" method="post">

                        {!! csrf_field() !!}

                                <!-- subject input-->
                        <div class="form-group">
                            <label class="control-label" for="title">Subject</label>
                            <input id="title" name="title" type="text" placeholder="subject" class="form-control" value="{{ old('title') }}">

                        </div>

                        <!-- Message body -->
                        <div class="form-group">
                            <label class="control-label" for="content">Your topic</label>
                            <textarea class="form-control" id="content" name="content" placeholder="Please enter your message here..." rows="5" value="{{ old('content') }}"></textarea>

                        </div>

                        <!-- Form actions -->
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-app-reverse btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    {!! HTML::script('js/tinymce/tinymce.min.js') !!}
    {!! HTML::script('js/tinymceConf-forum.js') !!}
@endsection