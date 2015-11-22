@extends('templates/app')

@section('title')
    Forum
@stop

@section('content')

    <div>
        <br>
        <a href="{{ url('/forum') }}">
            <button class="btn btn-primary">return to the list</button>
        </a>
        <hr>
    </div>

    <div class="jumbotron">
        <div class="container">
            <h1>{{ $topic->title }}</h1>
            <p>
                {{ $topic->content }}
            </p>
            <p class="pull-right">
                by <strong>{{ $topic->user->firstname }} {{ $topic->user->name }}</strong><br>
                at <strong>{{ $topic->created_at->format('d M Y - H:i:s') }}</strong>
            </p>
        </div>
    </div>

    @foreach ($posts as $post)

        <article class="row">
            <div class="col-md-12">
                <div class="panel panel-default arrow left">
                    <div class="panel-body">
                        <div>
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            {{ $post->user->firstname }} {{ $post->user->name }}
                        </div>
                        <div>
                            <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                            {{ $post->created_at->format('d M Y - H:i:s') }}
                        </div>
                        <div class="text-center">
                            <br>
                            <p>
                                 {{ $post->content }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </article>

    @endforeach

    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" id="create-post" action="{{ Request::fullUrl() }}" method="post">
                    <fieldset>

                        <legend class="text-center">Add a comment !</legend>

                        {!! csrf_field() !!}

                        <!-- Message body -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="message">Your message</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="content" name="content" placeholder="Enter your message here..." rows="5"></textarea>
                            </div>
                        </div>

                        <input type="text" id="topic_id" name="topic_id" value="{{ $topic->id }}" style="display:none"/>

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