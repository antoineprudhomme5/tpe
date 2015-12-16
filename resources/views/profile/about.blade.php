@extends('templates.app')

@section('content')
    <div class="container-fluid profile-theme" id="hero">
        <div class="wrapper container">
            <div class="page-header">
                <h1>About me</h1>
            </div>
            <div class="block scheme-blue about-rules">
                <p><b>H</b>ere you will find some questions to answer about yourself and about your opinion on a few topics.
                <p>Tell things that will spark other members' interest. Remember what seems dull to you may not be to others.
                    <br>
                    The more subjects you will answer, the more badges and points you will get.
                </p>

                <p>Try to spark interest and make complete sentences!</p>
            </div>
            <div class="about-me block scheme-white">
                {!! Form::open([
                    'route' => 'profile.about'
                ]) !!}
                    <?php $boucle = 1; ?>
                    @foreach($questions as $key => $q)
                        @if($key === 0)
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="{{$q->tag}}">{{$q->topic}}</label>
                                    <div class="controls">
                                        <textarea name="{{$q->tag}}" id="" rows="3" placeholder="{{$q->question}}"></textarea>
                                    </div>
                                </div>
                            </div>
                        @else
                            @if($boucle === 1)
                            <div class="row">
                            @endif
                                <div class="col-sm-6 col-xs-12">
                                    <label for="{{$q->tag}}">{{$q->topic}}</label>
                                    <div class="controls">
                                        <textarea name="{{$q->tag}}" id="" rows="3" placeholder="{{$q->question}}"></textarea>
                                    </div>
                                </div>
                            @if($boucle === 2)
                            </div>
                            <?php $boucle = 0; ?>
                            @endif
                            <?php $boucle += 1; ?>
                        @endif
                    @endforeach
                    @if($boucle != 1)
                        </div>
                    @endif
                <div class="text-center">
                    {!! Form::submit('Save', ['class' => 'btn btn-app-reverse btn-lg']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection