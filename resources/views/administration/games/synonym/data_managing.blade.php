@extends('administration.skeleton')

@section('wrapper')
    @include('partials.alerts.flash')
    @parent

@section('pageTitle')
    <h1>Synonym game <small>Here you can manage the data from the database easily.</small></h1>
@endsection

@section('content')

    {!! HTML::style('css/admin/form') !!}

    @if($synonyms->isEmpty())
        <div class="text-center">
            <h2>It looks like there is no data for this game.</h2>
            <h3>Add new synonyms with the form below.</h3>
        </div>
    @else
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Word</th>
                <th>Prop1</th>
                <th>Prop2</th>
                <th>Prop3</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($synonyms as $synonym)
                <tr>
                    <td>{{ $synonym->word }}</td>
                    <td>{{ $synonym->p1 }}</td>
                    <td>{{ $synonym->p2 }}</td>
                    <td>{{ $synonym->p3 }}</td>
                    <td class="pull-right">
                       <form method="post" action="{{ url('administration/games/synonym/remove', $synonym->id) }}">
                           {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-remove"></i>
                            </button>
                       </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-center">
            {!! $links !!}
        </div>
    @endif

    <div class="row">
        <div class="container">
            <form class="form-horizontal" method="post" action="{{ url('administration/games/synonym/store') }}">
                {!! csrf_field() !!}
                <div class="input-group">
                    <span class="input-group-addon" id="word">
                        <i class="fa fa-pencil"></i>
                    </span>
                    <input type="text" class="form-control" name="word" placeholder="Word" aria-describedby="word">
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon" id="p1">
                                <i class="fa fa-hashtag"></i>
                            </span>
                            <input type="text" class="form-control" name="p1" placeholder="Option 1" aria-describedby="p1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon" id="p1">
                                <i class="fa fa-hashtag"></i>
                            </span>
                            <input type="text" class="form-control" name="p2" placeholder="Option 2" aria-describedby="p2">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon" id="p2">
                                <i class="fa fa-hashtag"></i>
                            </span>
                            <input type="text" class="form-control" name="p3" placeholder="Option 3" aria-describedby="p3">
                        </div>
                    </div>
                </div>

                <div class="input-group">
                    <span class="input-group-addon" id="response">
                        <i class="fa fa-check"></i>
                    </span>
                    <input type="text" class="form-control" name="response" placeholder="Response" aria-describedby="response">
                </div>

                <div class="input-group">
                    <button type="submit" class="btn btn-success">Store</button>
                </div>
            </form>
        </div>
    </div>

@endsection
@endsection
