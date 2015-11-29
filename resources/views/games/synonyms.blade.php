@extends('templates/games')

@section('title')
    Synonyms game
@stop

@section('style')
    {!! HTML::style('css/synonyms.css') !!}
@stop

@section('content')
    <div class="container">
        <div class="row">
            <section>
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">

                            <li role="presentation" class="active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="{{ $synonyms[0]->word }}">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-tasks"></i>
                                    </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="{{ $synonyms[1]->word }}">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-tasks"></i>
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="{{ $synonyms[2]->word }}">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-tasks"></i>
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled" id="end">
                                <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="{{ $synonyms[3]->word }}">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-tasks"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <form role="form" action="{{ url('games/synonyms/submit') }}" method="post" id="form_synonyms">
                        {!! csrf_field() !!}
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <h3>{{ $synonyms[0]->word }}</h3>
                                <p>Choose the good response</p>
                                <input type="radio" name="radio1" id ="d1" value="NULL-{{ $synonyms[0]->id }}" style="display:none" checked="checked"/>
                                <div class="funkyradio">
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio1" id="radio1" value="{{ $synonyms[0]->p1 }}-{{ $synonyms[0]->id }}"/>
                                        <label for="radio1">{{ $synonyms[0]->p1 }}</label>
                                    </div>
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio1" id="radio2" value="{{ $synonyms[0]->p2 }}-{{ $synonyms[0]->id }}"/>
                                        <label for="radio2">{{ $synonyms[0]->p2 }}</label>
                                    </div>
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio1" id="radio3" value="{{ $synonyms[0]->p3}}-{{ $synonyms[0]->id }}"/>
                                        <label for="radio3">{{ $synonyms[0]->p3 }}</label>
                                    </div>
                                </div>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step2">
                                <h3>{{ $synonyms[1]->word }}</h3>
                                <p>Choose the good response</p>
                                <input type="radio" name="radio2" id ="d2" value="NULL-{{ $synonyms[1]->id }}" style="display:none" checked="checked"/>
                                <div class="funkyradio">
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio2" id="radio4" value="{{ $synonyms[1]->p1 }}-{{ $synonyms[1]->id }}"/>
                                        <label for="radio4">{{ $synonyms[1]->p1 }}</label>
                                    </div>
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio2" id="radio5" value="{{ $synonyms[1]->p2 }}-{{ $synonyms[1]->id }}"/>
                                        <label for="radio5">{{ $synonyms[1]->p2 }}</label>
                                    </div>
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio2" id="radio6" value="{{ $synonyms[1]->p3 }}-{{ $synonyms[1]->id }}"/>
                                        <label for="radio6">{{ $synonyms[1]->p3 }}</label>
                                    </div>
                                </div>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step3">
                                <h3>{{ $synonyms[2]->word }}</h3>
                                <p>Choose the good response</p>
                                <input type="radio" name="radio3" id ="d3" value="NULL-{{ $synonyms[2]->id }}" style="display:none" checked="checked"/>
                                <div class="funkyradio">
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio3" id="radio7" value="{{ $synonyms[2]->p1 }}-{{ $synonyms[2]->id }}"/>
                                        <label for="radio7">{{ $synonyms[2]->p1 }}</label>
                                    </div>
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio3" id="radio8" value="{{ $synonyms[2]->p2 }}-{{ $synonyms[2]->id }}"/>
                                        <label for="radio8">{{ $synonyms[2]->p2 }}</label>
                                    </div>
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio3" id="radio9" value="{{ $synonyms[2]->p3 }}-{{ $synonyms[2]->id }}"/>
                                        <label for="radio9">{{ $synonyms[2]->p3 }}</label>
                                    </div>
                                </div>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step4">
                                <h3>{{ $synonyms[3]->word }}</h3>
                                <p>Choose the good response</p>
                                <input type="radio" name="radio4" id ="d4" value="NULL-{{ $synonyms[3]->id }}" style="display:none" checked="checked"/>
                                <div class="funkyradio">
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio4" id="radio10" value="{{ $synonyms[3]->p1 }}-{{ $synonyms[3]->id }}"/>
                                        <label for="radio10">{{ $synonyms[3]->p1 }}</label>
                                    </div>
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio4" id="radio11" value="{{ $synonyms[3]->p2 }}-{{ $synonyms[3]->id }}"/>
                                        <label for="radio11">{{ $synonyms[3]->p2 }}</label>
                                    </div>
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio4" id="radio12" value="{{ $synonyms[3]->p3 }}-{{ $synonyms[3]->id }}"/>
                                        <label for="radio12">{{ $synonyms[3]->p3 }}</label>
                                    </div>
                                </div>
                                <ul class="list-inline pull-right">
                                    <li><button type="submit" class="btn btn-success btn-info-full next-step">Submit</button></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </section>
        </div>

        <div class="progress">
            <div id="timebar" class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
            </div>
        </div>
        <p>
            <span id="time"></span> secondes left !
        </p>
    </div>
@stop

@section('scripts')
    {!! HTML::script('js/synonyms.js') !!}
@stop