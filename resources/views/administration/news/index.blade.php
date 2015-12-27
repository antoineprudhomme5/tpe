@extends('administration.skeleton')
@section('wrapper')
    @include('partials.alerts.flash')
@parent
    @section('pageTitle')
        <h1>News <small>preview of the news</small></h1>
    @endsection
    @section('content')

        @if($news->isEmpty())
           <div class="text-center">
               <h2>It looks like there is no news.</h2>
               <h3>Click on the button below to create your first news.</h3>
           </div>
        @else
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Action</th>
                    <th>Title</th>
                    <th>Created at</th>
                    <th>Online</th>
                </tr>
                </thead>
                <tbody>
                @foreach($news as $i => $n)
                    <?php $uniq = md5(microtime().rand()); ?>
                    <tr>
                        <th scope="row">{{ $i+1 }}</th>
                        <td>
                            <a class="btn btn-primary edit" href="{{route('administration.news.edit', $n->id)}}"><i class="fa fa-pencil" title="Editer"></i></a>
                            &nbsp;&nbsp;
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route'  => ['administration.news.destroy', $n->id],
                                'name'   => $uniq,
                                'class'  => 'for-delete',
                            ]) !!}
                                {!! csrf_field() !!}
                                <input type="hidden" name="news_id" value="{{ $n->id }}"/>
                                <button type="submit" class="btn btn-danger"><i class="element-to-delete fa fa-trash-o"></i></button>
                            {!! Form::close() !!}
                        </td>
                        <td>{{ $n->title }}</td>
                        <td>{{ $n->created_at->format('d M Y - H:i:s') }}</td>
                        <td>
                            <div class="switch-wrapper">
                                @if ($n->online === 1)
                                    <input type="checkbox" class="online" value="1" checked>
                                @else
                                    <input type="checkbox" class="online">
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        <a href="{{ route('administration.news.create') }}" type="button" class="btn btn-primary btn-lg btn-block">Write a news</a>
    @endsection
    @section('scripts')
        {!! HTML::script('js/news.js') !!}
    @endsection
@endsection