@extends('templates/games')

@section('style')
    {!! HTML::style('css/dragdrop.css') !!}
    {!! HTML::style('compass/stylesheets/styles.css') !!}
@stop

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" /> <!-- token ajax request -->

    @if($resource[0]->type === 'img')
        <div class="row">
            <div class="col-xs-12">
                <div class="game-resource">
                    <h3>Speak About...<span id='chrono' class="pull-right"></span></h3>
                    <hr/>
                    <h4>This picture</h4>
                    <p>You have 15 secondes before the chronometer starts. During this time, analyse the photo below. After that, record yourself with Audacity or another software by speaking 1 or 2 minutes on the picture.</p>
                    <img id="resource_image" src="../../{{ $resource[0]->link }}" class="img-responsive" alt="Responsive image">
                    <br>
                    <p>When you have finished, send your .mp3 recording. A teacher will listen it and give you some points if you did it well.</p>
                </div>
            </div>
        </div>
    @elseif($resource[0]->type === 'audio')
        <div class="row">
            <div class="col-xs-12">
                <div class="game-resource">
                    <h3>Speak About...<span id='chrono' class="pull-right"><span></h3>
                    <hr/>
                    <h4>This recording</h4>
                    <p>When your listening will be ended ,the chronometer will starts. During this time, analyse the photo below. After that, record yourself with Audacity or another software by speaking 1 or 2 minutes.</p>
                    <div class="text-center">
                        <audio controls id="audio">
                            <source id="resource_audio" src="../../{{ $resource[0]->link }}" type="audio/mpeg">
                        </audio>
                    </div>
                    <br>
                    <p>When you have finished, send your .mp3 recording. A teacher will listen it and give you some points if you did it well.</p>
                </div>
            </div>
        </div>
    @endif

    <div>

        <!-- success/error messages -->
        <div class="alert alert-danger" role="alert" id="upload_error">
            <strong>Error</strong>
            <span id="error_message"></span>
        </div>
        <div class="alert alert-success" role="alert" id="upload_success">
            <strong>Success</strong>
            <span id="filename"></span>
        </div>

        <form action=" " method="post" enctype="multipart/form-data" id="js-upload-form">
            <input type="hidden" name="resource" id="resource" value="{{ $resource[0]->id }}" />
            <!-- Drop Zone -->
            <h4>Drag your audio file below</h4>
            <div class="upload-drop-zone" id="drop-zone">
                Just drag and drop your record here
            </div>
            <button type="button" class="btn btn-sm btn-primary" id="js-upload-submit">Upload files</button>
        </form>

        <!-- Progress Bar -->
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                <span class="sr-only">60% Complete</span>
            </div>
        </div>

    </div>
@stop

@section('scripts')
    {!! HTML::script('js/dragdrop.js') !!}
    {!! HTML::script('js/speakabout_chrono.js') !!}
@stop