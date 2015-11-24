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

                            <li role="presentation" class="disabled">
                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <form role="form" action="{{ url('games/synonyms/submit') }}" method="post">
                        {!! csrf_field() !!}
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <h3>{{ $synonyms[0]->word }}</h3>
                                <p>Choose the good response</p>
                                <div class="funkyradio">
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio" id="radio4" />
                                        <label for="radio4">{{ $synonyms[0]->p1 }}</label>
                                    </div>
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio" id="radio5" />
                                        <label for="radio5">{{ $synonyms[0]->p2 }}</label>
                                    </div>
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio" id="radio6" />
                                        <label for="radio6">{{ $synonyms[0]->p3 }}</label>
                                    </div>
                                </div>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step2">
                                <h3>{{ $synonyms[1]->word }}</h3>
                                <p>Choose the good response</p>
                                <div class="funkyradio">
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio" id="radio4" />
                                        <label for="radio4">{{ $synonyms[1]->p1 }}</label>
                                    </div>
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio" id="radio5" />
                                        <label for="radio5">{{ $synonyms[1]->p2 }}</label>
                                    </div>
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio" id="radio6" />
                                        <label for="radio6">{{ $synonyms[1]->p3 }}</label>
                                    </div>
                                </div>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                    <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step3">
                                <h3>{{ $synonyms[2]->word }}</h3>
                                <p>Choose the good response</p>
                                <div class="funkyradio">
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio" id="radio4" />
                                        <label for="radio4">{{ $synonyms[2]->p1 }}</label>
                                    </div>
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio" id="radio5" />
                                        <label for="radio5">{{ $synonyms[2]->p2 }}</label>
                                    </div>
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio" id="radio6" />
                                        <label for="radio6">{{ $synonyms[2]->p3 }}</label>
                                    </div>
                                </div>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                    <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                                    <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="complete">
                                <h3>Complete</h3>
                                <p>You have successfully completed all steps.</p>
                                <div class="form-group">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-success btn-lg">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@stop

@section('scripts')
    {!! HTML::script('js/synonyms.js') !!}
@stop