@extends('templates/games')

@section('title')
    Speak About...
@stop

@section('style')
    {!! HTML::style('css/dragdrop.css') !!}
    {!! HTML::style('compass/stylesheets/styles.css') !!}
@stop

@section('content')
    <div class="container app-content">

        <meta name="csrf-token" content="{{ csrf_token() }}"/> <!-- token ajax request -->

        <div class="row">

            <section id="loading">
                @include('include/loading')
            </section>

            <section id="ready">
                @include('include/ready')
            </section>

            <section id="game">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="game-resource">
                            <h3>Speak About...<span id='chrono' class="pull-right"></span></h3>
                            <hr/>
                            <div id="game-resource">

                            </div>
                            <br>
                            <p>When you have finished, send your .mp3 recording. A teacher will listen it and give
                                you some points if you did it well.</p>
                        </div>
                    </div>
                </div>

                <div id="game_form">

                    <!-- success/error messages -->
                    <div class="alert alert-danger" role="alert" id="upload_error">
                        <strong>Error</strong>
                        <span id="error_message"></span>
                    </div>
                    <div class="alert alert-success" role="alert" id="upload_success">
                        <strong>Success</strong>
                        <span id="filename"></span>
                    </div>

                    <form id="js-upload-form">
                        <!-- Drop Zone -->
                        <h4>Drag your audio file below</h4>

                        <div class="upload-drop-zone" id="drop-zone">
                            Just drag and drop your record here
                        </div>

                    </form>

                </div>
            </section>

        </div>
    </div>
@stop

@section('scripts')
    {!! HTML::script('js/speakabout.js') !!}
@stop