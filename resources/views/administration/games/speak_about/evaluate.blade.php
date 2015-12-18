@extends('administration.skeleton')

@section('wrapper')
    @include('partials.alerts.flash')
    @parent

@section('style')
    <style>
        .img-speakabout-admin
        {
            width: 300px;
            height: auto;
        }
    </style>
@stop

@section('pageTitle')
    <h1>Speak-About Game <small>Here you can manage the data from the database easily.</small></h1>
@endsection

@section('content')

    {!! HTML::style('css/admin/form') !!}

    @if($records->isEmpty())
        <div class="text-center">
            <h2>It looks like there is no record to evaluate.</h2>
            <h3></h3>
        </div>
    @else
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Student</th>
                <th>Subject</th>
                <th>Record</th>
                <th>Mark</th>
            </tr>
            </thead>
            <tbody>
            @foreach($records as $record)
                <tr>
                    <td>
                        {{ $record->user->firstname }} {{ $record->user->name }}
                    </td>
                    <td>
                        @if($record->speakAbout->type == 'img')
                            <img src="{{ asset($record->speakAbout->link) }}" class="img-responsive img-speakabout-admin"/>
                        @elseif($record->speakAbotu->type == 'audio')
                            <audio controls>
                                <source src="{{ asset($record->speakAbout->link) }}" type="audio/mpeg">
                            </audio>
                        @endif
                    </td>
                    <td>
                        <audio controls>
                            <source src="{{ asset($record->link) }}" type="audio/mpeg">
                        </audio>
                    </td>
                    <td class="pull-right">
                        <form method="post" action="{{ url('administration/games/evaluate/speak_about/evaluate', $record->id) }}">
                            <input type="text" class="form-control" name="mark" placehoder="/20"/>
                            <button class="btn btn-success">Send</button>
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

@endsection
@endsection
