@extends('administration.skeleton')

@section('wrapper')
@parent
    @section('pageTitle')
        <h1>News <small>preview of the news</small></h1>
    @endsection
    @section('content')
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
                <tr>
                    <th scope="row">{{ $i+1 }}</th>
                    <td>
                        <a class="edit" href=""><i class="fa fa-pencil" title="Editer"></i></a>
                        &nbsp;&nbsp;
                        <span class="trash"><i class="element-to-delete fa fa-trash-o" id="12" data-toggle="modal" data-target="#" title="Supprimer"></i></span>
                    </td>
                    <td>{{ $n->title }}</td>
                    <td>{{ $n->created_at->format('d M Y - H:i:s') }}</td>
                    <td>
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch{{$i}}" checked>
                            <label class="onoffswitch-label" for="myonoffswitch{{$i}}"></label>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('AdAddNews') }}" type="button" class="btn btn-primary btn-lg btn-block">Write a news</a>
    @endsection
@endsection