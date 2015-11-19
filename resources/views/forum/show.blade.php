@extends('templates/app')

@section('title')
    Forum
@stop

@section('content')

    <a href="{{ url('/forum') }}"><button class="btn btn-primary">return to the list</button></a>

    <div class="jumbotron">

        by {{ $topic->user->name }}
        at {{ $topic->created_at }}

        <div class="container">

            <h2>{{ $topic->title }}</h2>
            <p>
                {{ $topic->content }}
            </p>

        </div>
    </div>

    @foreach ($posts as $post)

        <div class="row">
            
            by <b>{{ $post->user->name }}</b>
            at <em>{{ $post->created_at }}</em>
            <p>{{ $post->content }}</p>

        </div>

        <hr>

    @endforeach

    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" id="create-post" action="{{ Request::fullUrl() }}" method="post">
                    <fieldset>

                        <legend class="text-center">Add a comment !</legend>

                        {!! csrf_field() !!}

                        <input type="text" value="{{ Request::segment(3) }}" name="topic_id" id="topic_id" style="display:none"/>
                
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