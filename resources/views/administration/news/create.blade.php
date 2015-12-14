@extends('administration.skeleton')

@section('wrapper')
    @parent
@section('pageTitle')
    <h1>News <small>write a news</small></h1>
@endsection
@section('content')
    @include('partials.alerts.errors')
    {!! Form::open([
        'route' => 'administration.news.store'
    ]) !!}
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="title">Title <span id="result" class="result"></span></label>
            <input type="text" class="form-control" id="title" name="title" maxlength="200" placeholder="Title of the news" value="{{ old('title') }}" required>
        </div>
        <div class="form-group">
            <label for="online">Online</label>
            {{--<input type="checkbox" name="online" value="1" checked>--}}
            {!! Form::checkbox('online', '1', true) !!}
        </div>
        <div class="form-group">
            <label for="description">Content</label>
            <textarea name="description" id="description" value="{{ old('description') }}"></textarea>
        </div>
        <div class="text-center">
            {!! Form::submit('Validate', ['class' => 'btn btn-primary']) !!}
            <a href="" class="btn btn-warning" role="button">Cancel</a>
        </div>
    {!! Form::close() !!}
@endsection
@endsection
@section('scripts')
    {!! HTML::script('js/tinymce/tinymce.min.js') !!}
    {!! HTML::script('js/tinymceConf.js') !!}
@endsection