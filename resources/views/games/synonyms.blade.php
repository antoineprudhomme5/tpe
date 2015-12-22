@extends('templates/games')

@section('title')
    Synonyms
@stop

@section('style')
    {!! HTML::style('css/synonyms.css') !!}
    {!! HTML::style('css/style.css') !!}
    {!! HTML::style('compass/stylesheets/styles.css') !!}
@stop

@section('content')
    <div class="container app-content">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="row">

            <section id="loading">
                @include('include/loading')
            </section>

            <section id="ready">
                @include('include/ready')
            </section>

            <section id="response">

            </section>

            <section id="game">
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">

                            <li role="presentation" class="active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step1">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-tasks"></i>
                                    </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step2">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-tasks"></i>
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step3">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-tasks"></i>
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled" id="end">
                                <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Step4">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-tasks"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <form id="form_synonyms">
                        {!! csrf_field() !!}
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <h3></h3>
                                <p>Choose the good response</p>
                                <input type="radio" name="radio1" id="d1" style="display:none" checked="checked"/>
                                <div class="funkyradio">
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio1" id="radio1" value=""/>
                                        <label id="label1">syn1</label>
                                    </div>
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio1" id="radio2" value=""/>
                                        <label id="label1">syn2</label>
                                    </div>
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio1" id="radio3" value=""/>
                                        <label for="radio3">syn3</label>
                                    </div>
                                </div>
                                <br>
                                <ul class="list-inline">
                                    <li>
                                        <button type="button" class="btn btn-primary next-step">Save and continue
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step2">
                                <h3></h3>
                                <p>Choose the good response</p>
                                <div>
                                    <input type="radio" name="radio2" id="d2" style="display:none" checked="checked"/>
                                    <div class="funkyradio">
                                        <div class="funkyradio-primary">
                                            <input type="radio" name="radio2" id="radio4" value=""/>
                                            <label for="radio4">syn1</label>
                                        </div>
                                        <div class="funkyradio-primary">
                                            <input type="radio" name="radio2" id="radio5" value=""/>
                                            <label for="radio5">syn2</label>
                                        </div>
                                        <div class="funkyradio-primary">
                                            <input type="radio" name="radio2" id="radio6" value=""/>
                                            <label for="radio6">syn3</label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <ul class="list-inline">
                                    <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step3">
                                <h3></h3>
                                <p>Choose the good response</p>
                                <div>
                                    <input type="radio" name="radio3" id="d3" value="" style="display:none" checked="checked"/>
                                    <div class="funkyradio">
                                        <div class="funkyradio-primary">
                                            <input type="radio" name="radio3" id="radio7" value=""/>
                                            <label for="radio7">syn1</label>
                                        </div>
                                        <div class="funkyradio-primary">
                                            <input type="radio" name="radio3" id="radio8" value=""/>
                                            <label for="radio8">syn2</label>
                                        </div>
                                        <div class="funkyradio-primary">
                                            <input type="radio" name="radio3" id="radio9" value=""/>
                                            <label for="radio9">syn3</label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <ul class="list-inline">
                                    <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step4">
                                <h3></h3>
                                <p>Choose the good response</p>
                                <div>
                                    <input type="radio" name="radio4" id="d4" value="" style="display:none" checked="checked"/>
                                    <div class="funkyradio">
                                        <div class="funkyradio-primary">
                                            <input type="radio" name="radio4" id="radio10" value=""/>
                                            <label for="radio10">syn1</label>
                                        </div>
                                        <div class="funkyradio-primary">
                                            <input type="radio" name="radio4" id="radio11" value=""/>
                                            <label for="radio11">syn2</label>
                                        </div>
                                        <div class="funkyradio-primary">
                                            <input type="radio" name="radio4" id="radio12" value=""/>
                                            <label for="radio12">syn3</label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <ul class="list-inline pull-right">
                                    <li><button type="submit" class="btn btn-success btn-info-full next-step">Submit</button></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
                <div class="progress">
                    <div id="timebar" class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    </div>
                </div>
                <p>
                    <span id="time"></span> secondes left !
                </p>
            </section>

        </div>

    </div>
@stop

@section('scripts')
    {!! HTML::script('js/synonyms.js') !!}
@stop