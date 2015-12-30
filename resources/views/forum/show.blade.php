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
                <h2>{{$topic->title}}</h2>
            </div>
            @if($topic->user->id == Auth::user()->id)
                <div class="row">
                    <div class="text-center padding">
                        <form class="form-inline" method="post" action="{{ url('forum/delete') }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="topic_id" value="{{ $topic->id }}"/>
                            <div class="form-group">
                                <a class="btn btn-app-success-reverse" href="#addComment" role="button">Add new comment</a>
                            </div>
                            <div class="form-group">
                                <input type="button" class="btn btn-app-reverse" name="edit" id="edit" value="Edit"/>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-app-danger-reverse" name="remove" value="Remove my topic"/>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="div-edit">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="block">
                                <form class="form-horizontal" method="post" action="{{ url('forum/update', $topic->id) }}">
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" maxlength="100" placeholder="Title of the topic" value="{{ $topic->title }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Content</label>
                                        <textarea name="content" id="content">{!! $topic->content !!}</textarea>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-app-reverse btn-lg">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                @if(Auth::user()->category_id == 1)
                    <div class="pull-right">
                        <form method="post" action="{{ url('forum/delete') }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="topic_id" value="{{ $topic->id }}"/>
                            <input type="submit" class="btn btn-danger btn-sm pull-right" name="remove" value="remove topic"/>
                        </form>
                    </div>
                @endif
                <div class="date">
                    by <strong>{{ $topic->user->firstname }} {{ $topic->user->name }}</strong><br>
                    at <strong>{{ $topic->created_at->format('d M Y - H:i:s') }}</strong>
                </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default subject arrow left">
                        <div class="panel-body">
                            <div>
                                {!! $topic->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @foreach ($posts as $post)
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel panel-default arrow left">
                            <div class="panel-body">
                                @if($post->user->id == Auth::user()->id || Auth::user()->category_id == 1)
                                    <form method="post" action="{{ url('post/delete') }}">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="post_id" value="{{ $post->id }}"/>
                                        <input type="submit" class="btn btn-app-danger-reverse btn-sm pull-right" name="remove" value="remove"/>
                                    </form>
                                @endif
                                <div>
                                    <i class="fa fa-user"></i> &nbsp; {{ ucfirst($post->user->firstname) }} {{ ucfirst($post->user->name) }}
                                </div>
                                <div>
                                    <i class="fa fa-clock-o"></i>&nbsp; {{ $post->created_at->format('d M Y - H:i:s') }}
                                </div>
                                <div>
                                    {!! $post->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col-md-12">
                    <div class="block scheme-blue" id="addComment">
                        <form class="" id="create-post" action="{{ Request::fullUrl() }}" method="post">
                            {!! csrf_field() !!}
                            <fieldset>
                                <legend class="text-center color-white">Add a new comment</legend>
                                <!-- Message body -->
                                <div class="form-group">
                                    <textarea class="form-control" id="content2" name="content" placeholder="Enter your message here..." rows="5"></textarea>
                                </div>

                                <input type="text" id="topic_id" name="topic_id" value="{{ $topic->id }}" style="display:none"/>

                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class="col-md-1 col-md-offset-5">
                                        <button type="submit" class="btn btn-app btn-lg">Submit</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    {!! HTML::script('js/tinymce/tinymce.min.js') !!}
    {!! HTML::script('js/tinymceConf-forum.js') !!}
    <script type="text/javascript">
        $(document).ready(function () {
            $("#div-edit").hide();

            $("#edit" ).click(function(e) {
                var SH = this.SH^=1; // "Simple toggler"
                $(this).val(SH?'Hide':'Edit')
                        .css({backgroundPosition:'0 '+ (SH?-18:0) +'px'})
                        .parent().parent().parent().parent().next('#div-edit').toggle();
//                $('#div-edit').toggle('swing');
            });
        });
    </script>
@endsection