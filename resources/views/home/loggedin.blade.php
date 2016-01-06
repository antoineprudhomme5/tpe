<?php
use Carbon\Carbon;
?>
<div class="container-fluid" id="hero">
    <div class="wrapper container">
        <div class="page-header">
            <h1>Welcome back, {{ucfirst(Auth::user()->firstname)}}.</h1>
        </div>
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <div class="block home-dashboard scheme-blue">
                    <div class="home-pic hidden-sm">
                        @if(Auth::user()->avatar === null || Auth::user()->avatar === '')
                            <img class="pic img-circle" src="{{asset('img/avatars/default_avatar.png')}}" alt="">
                        @else
                            <img class="pic img-circle" src="{{asset('img/avatars')}}/{{Auth::user()->avatar_sm}}" alt="">
                        @endif
                    </div>
                    <h4 class="block-heading home-username">
                        <a href="/{{ Auth::user()->firstname }}">{{ ucfirst(Auth::user()->firstname) }} {{ ucfirst(Auth::user()->name) }}</a>
                    </h4>
                    <ul class="home-notifications text-center">
                        <li>
                            <a href="#" title="" data-toggle="tooltip" data-container="body" data-original-title="0 nouveau message">
                                <i class="fa fa-envelope"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="" data-toggle="tooltip" data-container="body" data-original-title="0 nouveau commentaire">
                                <i class="fa fa-comment"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="" data-toggle="tooltip" data-container="body" data-original-title="0 nouveau badge">
                                <i class="fa fa-trophy"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="last-visit">
                        <p><b>Last visit :</b></p>
                        <p class="text-center">
                            About
                            <?php
                            $last = new Carbon(Auth::user()->last_login);
                            $now = Carbon::now();
                            echo $last->diffForHumans($now, true);
                            ?>
                            ago
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-xs-12">
                <div class="block-group scheme-blue">
                    <div class="block block-sm hidden-xs">
                        <div class="inline-left"><strong>Level progress:</strong></div>
                        <div class="inline-full">
                            <div class="progress progress-sm">
                                <div class="progress-bar" role="progressbar" style="width: {{$level['percent']}}%">
                                </div>
                            </div>
                        </div>
                        <div class="inline-right"><strong><a class="orange-links" href="#">{{$level['level']}}</a></strong></div>
                    </div>
                    <div class="block block-sm home-tip">
                        <h4 class="block-heading">Improve your skills</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aut blanditiis commodi,
                            cumque, cupiditate dolor ea id obcaecati porro quam quia saepe velit veritatis.
                        </p>
                    </div>
                </div>
            </div>
        </div><!-- /First row -->

        <div class="row">
            <div class="col-xs-12">
                <div class="home-news block scheme-white">
                    <h2 class="inline">Last news</h2>
                    <a class="inline pull-right" href="{{url('/news')}}"><h5>All news</h5></a>
                    <hr/>
                    <h4>{{ $actu->title }}</h4>
                    <p class="small">On <i>{{ $actu->created_at->format('d M Y') }}</i></p>
                    <div>
                        {!! $actu->description !!}
                    </div>
                </div>
            </div>
        </div><!-- /.Second row _ News -->

        <div class="row">
            <div class="col-sm-6 hidden-sx">
                <div class="block block-sm scheme-blue">
                    <h3 class="block-heading">Live chat activity</h3>
                    <div class="forum">
                        <p>It's pretty quiet in here. Come take a look!</p>
                        <br>
                        <i class="fa fa-comments" style="color: #DAD8D8; font-size: 65px; text-shadow: 1px 1px 0 #A0A0A0;"></i>
                    </div>
                    <div class="text-center padding-sm">
                        <a type="button" target="_blank" class="btn btn-app btn-sm" data-toggle="modal" href="#">Check out chatroom</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="block block-sm scheme-blue">
                    <h3 class="block-heading">Latest forum activity</h3>
                    <ul class="list-group">
                        @foreach($topics as $topic)
                            <li class="list-group-item">
                                <span class="badge">3 posts</span>
                                <a class="topic-recently-updated" href="{{ url('forum/show', $topic->id) }}">{{ $topic->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div><!-- /.Third row -->
    </div>
</div>
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

        });
    </script>
@endsection