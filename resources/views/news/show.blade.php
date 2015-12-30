@extends('templates/app')

@section('style')
    {!! HTML::style('css/style.css') !!}
@stop

@section('title')
    {{$news->title}}
@stop

@section('content')
    <div class="container-fluid" id="hero">
        <div class="wrapper container">
            <div class="page-header">
                <h1 class="inline">{{$news->title}}</h1>
                <a type="button" class="btn btn-app-reverse inline pull-right" href="{{ URL::previous() }}"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <article>
                {!! $news->description !!}
            </article>
        </div>
    </div>
@stop
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.home-news', function(){
                $('img').each(function() {
                    $(this).addClass("img-responsive");
                });
            });
        });
    </script>
@endsection