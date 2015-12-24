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
                <!-- POINTS -->
                <div class="col-lg-6 col-md-12">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-trophy fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h2 class="huge">Points</h2>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-center">
                            <h2>{{ $points }}</h2>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- RANK -->
                <div class="col-lg-6 col-md-12">
                    <div class="panel panel-purple">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-mortar-board fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h2 class="huge">Rank</h2>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Points</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Jean michel</td>
                                        <td>589</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Jean michel</td>
                                        <td>589</td>
                                    </tr>
                                    <tr class="active">
                                        <th scope="row">2</th>
                                        <td>Antoine prudhomme</td>
                                        <td>666</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Jean michel</td>
                                        <td>589</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Jean michel</td>
                                        <td>589</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- RANK -->
                <div class="col-lg-6 col-md-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-gamepad fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h2 class="huge">Last games</h2>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Game</th>
                                    <th>Points</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Synonyms</td>
                                    <td>20</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Synonyms</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Synonyms</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Synonyms</td>
                                    <td>30</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Synonyms</td>
                                    <td>10</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                liste des badges
            </div>

        </div>
    </div>
@endsection