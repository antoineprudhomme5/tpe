@extends('templates.app')

@section('content')
    <div class="container-fluid profile-theme" id="hero">
        <div class="wrapper container">
            <div class="page-header">
                <h1>Your profile</h1>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="block block-sm block-header scheme-white">
                        <h4 class="catcher self">This session is empty. Edit your profile to fill it.</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 col-xs-12 hidden-xs">
                <div class="hidden-xs">
                    <div class="block scheme-white text-center">
                        <img src="{{ asset("/img/students/avatar.jpg") }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-xs-12">
                <div class="block block-sm white-scheme">
                    <h2 class="user-username">{{ ucfirst(Auth::user()->firstname) }} <small class="user-label">Casual</small></h2>
                    <p class="profile-info">
                        <i class="fa fa-user fa-fw"></i>
                    </p>
                </div>
            </div>
        </div>

    </div>
@endsection