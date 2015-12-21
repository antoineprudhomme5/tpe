@extends('templates/app')

@section('style')
    {!! HTML::style('css/style.css') !!}
@stop

@section('title')
    Forum
@stop

@section('content')
    <div class="container app-content">

        {{--the topic--}}
        <div class="jumbotron">
            <div class="container">

                @if($topic->user->id == Auth::user()->id)
                    <div class="pull-right">
                        <form method="post" action="{{ url('forum/delete') }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="topic_id" value="{{ $topic->id }}"/>
                            <input type="submit" class="btn btn-danger pull-right" name="remove" value="remove"/>
                        </form>
                    </div>

                    <h1>My topic</h1>
                    <p>
                        You can delete your topic by clicking on the red button or change
                        the title or content with the form and apply your changes by clicking on the green button.
                    </p>
                    <form class="form-horizontal" method="post" action="{{ url('forum/update', $topic->id) }}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="title">The title</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="title" name="title" value="{{ $topic->title }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="content">Content</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="content" rows="5">{{ $topic->content }}</textarea>
                            </div>
                        </div>
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-success">Edit</button>
                        </div>
                    </form>

                @else
                    @if(Auth::user()->category_id == 1)
                        <div class="pull-right">
                            <form method="post" action="{{ url('forum/delete') }}">
                                {!! csrf_field() !!}
                                <input type="hidden" name="topic_id" value="{{ $topic->id }}"/>
                                <input type="submit" class="btn btn-danger pull-right" name="remove" value="remove"/>
                            </form>
                        </div>
                    @endif
                    <h1>{{ $topic->title }}</h1>
                    <p>
                        {{ $topic->content }}
                    </p>
                    <p class="pull-right">
                        by <strong>{{ $topic->user->firstname }} {{ $topic->user->name }}</strong><br>
                        at <strong>{{ $topic->created_at->format('d M Y - H:i:s') }}</strong>
                    </p>

                @endif

            </div>
        </div>

        {{--all the comments--}}
        @foreach ($posts as $post)
            <article class="row">
                <div class="col-md-12">
                    <div class="panel panel-default arrow left">
                        <div class="panel-body">
                            @if($post->user->id == Auth::user()->id || Auth::user()->category_id == 1)
                                <form method="post" action="{{ url('post/delete') }}">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="post_id" value="{{ $post->id }}"/>
                                    <input type="submit" class="btn btn-danger pull-right" name="remove" value="remove"/>
                                </form>
                            @endif
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

        {{--add a comment form--}}
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
    </div>


@stop