@extends('administration.skeleton')

@section('wrapper')
    @include('partials.alerts.flash')
    @parent

@section('pageTitle')
    <h1>Question : {{ $question->question }} <small>Here you can manage the answers of the question.</small></h1>
@endsection

@section('content')

    <div>
        <h2>Is playable ?</h2>
        <p>{{ $question->playable }}</p>
    </div>

    <div class="row">
        <div class="container-fluid">
            <h2>Create a new answer</h2>
            <form class="form-inline" method="post" action="{{ url('administration/mcq/'.$mcq_id.'/answers/'.$question->id.'/add_answer') }}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" class="form-control" name="answer" placeholder="Answer" aria-describedby="answer">
                    <label class="radio-inline">
                        <input type="radio" name="answer_correct" id="answer_false" value="false"> false
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="answer_correct" id="answer_true" value="true"> true
                    </label>
                    <button type="submit" class="btn btn-success">Add answer</button>
                </div>
            </form>
        </div>
    </div>

    <div>
        <h2>For a question to be valid : </h2>
        <p>
            A question requires at least 2 answers. You can write 5 answers max for a question.
            One answers at least have to be correct.
        </p>
    </div>

    @if($answers->isEmpty())
        <div class="text-center">
            <h2>It looks like there is no answers for this question.</h2>
            <h3>Use the form below to create a new answer</h3>
        </div>
    @else
        <div>
            <h2>Answers</h2>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Answer</th>
                <th>Correct</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($answers as $a)
                <tr>
                    <td>{{ $a->id }}</td>
                    <td>{{ $a->answer}}</td>
                    <td>{{ $a->correct }}</td>
                    <td>
                        <form action="{{ url('administration/mcq/'.$mcq_id.'/answers/'.$question->id.'/remove_answer', $a->id) }}" method="post">
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
