@extends('templates/app')

@section('style')
    {!! HTML::style('css/style.css') !!}
@stop

@section('title')
    News
@stop

@section('content')
    <div class="container-fluid" id="hero">
        <div class="wrapper container">
            <div class="page-header">
                <h1>News</h1>
            </div>
            <div id="news-list">
                <div class="row">
                    <main>
                        @foreach($news as $n)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3>{{$n->title}}</h3>
                                    <p>On {{ $n->created_at->format('d M Y') }}</p>
                                </div>
                                <div class="panel-body">
                                    {{ strip_tags(str_limit($n->description,100)) }}
                                    <br>
                                    <a href="{{ url('/news') }}/{{$n->slug}}">Read more</a>
                                </div>
                            </div>
                        @endforeach
                       <div class="text-center">
                           {!! $news->render() !!}
                       </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
@stop