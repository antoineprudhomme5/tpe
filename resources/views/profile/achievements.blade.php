@extends('templates.app')

@section('style')
    {!! HTML::style('css/achievements.css') !!}
@stop

@section('content')
    @include('partials.alerts.flash')
    <div class="container-fluid profile-theme" id="hero">
        <div class="wrapper container">
            <div class="page-header">
                <h1>My achievements</h1>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-trophy fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h2 class="huge">666</h2>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-center">
                            <h3>Points</h3>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                historique 5 derniers jeux
            </div>

            <div>
                positions par rapport aux autres ( afficher 2 au dessus et 2 en dessous )
            </div>

            <div>
                liste des badges
            </div>

        </div>
    </div>
@endsection