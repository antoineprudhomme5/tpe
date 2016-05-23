@extends('administration.skeleton')

@section('wrapper')
    @include('partials.alerts.flash')
    @parent

@section('pageTitle')
    <h1>Multiple choices question game <small>Here you can manage the data from the database easily.</small></h1>
@endsection

@section('content')

    <div class="row">
        <div class="container-fluid">
            <span>Create a new quizz</span>
            <form class="form-inline" method="post" action="{{ url('administration/mcq/create_mcq') }}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Name" aria-describedby="name">
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </form>
        </div>
    </div>

    @if($mcq->isEmpty())
        <div class="text-center">
            <h2>It looks like there is no MCQ.</h2>
            <h3>Use the form below to create a new MCQ</h3>
        </div>
    @else
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Actions</th>
                <th>Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mcq as $q)
                <tr>
                    <td>{{ $q->id }}</td>
                    <td>
                        <a href="{{ url('administration/mcq', $q->id) }}">
                            <button class="btn btn-primary">
                                <i class="fa fa-edit"> </i>
                                Data managing
                            </button>
                        </a>
                    </td>
                    <td>{{ $q->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

@endsection
@endsection
