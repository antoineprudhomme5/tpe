@extends('administration.skeleton')

@section('wrapper')
    @include('partials.alerts.flash')
    @parent

@section('pageTitle')
    <h1>MCQ : {{ $mcq->name }} <small>Here you can manage the question from the mcq.</small></h1>
@endsection

@section('content')

    <div>
        <h2>Is playable ?</h2>
        <p>{{ $mcq->playable }}</p>
    </div>

    <div class="row">
        <div class="container-fluid">
            <span>Create a new question</span>
            <form class="form-inline" method="post" action="{{ url('administration/mcq/'.$mcq->id.'/create_question') }}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" class="form-control" name="question" placeholder="Question" aria-describedby="question">
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </form>
        </div>
    </div>

    @if($questions->isEmpty())
        <div class="text-center">
            <h2>It looks like there is no questions in this MCQ.</h2>
            <h3>Use the form below to create a new question</h3>
        </div>
    @else
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Answer</th>
                <th>Playable</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($questions as $q)
                <tr>
                    <td>{{ $q->id }}</td>
                    <td>{{ $q->question }}</td>
                    <td>
                        <a href="{{ url('administration/mcq/'.$mcq->id.'/answers', $q->id) }}">
                            <button class="btn btn-primary">
                                <i class="fa fa-edit"> </i>
                            </button>
                        </a>
                    </td>
                    <td>
                        @if($q->playable)
                            <i class="fa fa-check"> </i>
                        @else
                            <i class="fa fa-remove"> </i>
                        @endif
                    </td>
                    <td>
                        <form action="{{ url('administration/mcq/'.$mcq->id.'/remove', $q->id) }}" method="post">
                            {!! csrf_field() !!}
                            <button class="btn btn-danger" type="submit">
                                <i class="fa fa-remove"> </i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

@endsection
@endsection
