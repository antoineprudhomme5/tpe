@extends('templates/app')

@section('title')
    Forum
@stop

@section('content')

    <a href="{{ url('/forum') }}"><button class="btn btn-primary">return to the list</button></a>

    <div class="jumbotron">

        by {{ $topic->user_id }}

        <div class="container">

            <h2>{{ $topic->title }}</h2>
            <p>
                {{ $topic->content }}
            </p>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" id="create-post" action="{{ url('/post/create') }}" method="post">
                    <fieldset>

                        <legend class="text-center">Add a comment !</legend>

                        {!! csrf_field() !!}
                
                        <!-- Message body -->
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <textarea class="form-control" id="content" name="content" placeholder="Please enter your message here..." rows="5" value="{{ old('content') }}"></textarea>
                            </div>
                        </div>
                
                        <!-- Form actions -->
                        <div class="form-group">
                            <div class="col-md-1 col-md-offset-5">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>

@stop