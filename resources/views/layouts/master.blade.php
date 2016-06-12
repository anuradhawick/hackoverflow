<?php header("access-control-allow-origin: *"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Hackoveflow, collect all the hackathon news and deliver it to the IT community.">
    <meta name="author" content="">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script>
        $(window).load(function () {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");
        });
    </script>
    <style>
        .no-js #loader {
            display: none;
        }

        .js #loader {
            display: block;
            position: absolute;
            left: 100px;
            top: 0;
        }

        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 100;
            background: url("{{ asset('/images/loader.gif') }}") center no-repeat #fff;
        }
    </style>
    <div class="se-pre-con"></div>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/hackoverflow.css')}}">
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('js/jquery.isotope.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="{{asset('js/html5shiv.js')}}"></script>
    <script src="{{asset('js/respond.min.js')}}"></script>
    <script src="{{asset('js/jquery.validate.min.js')}}"></script>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="{{asset('images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="{{asset('images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="{{asset('images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('images/ico/apple-touch-icon-57-precomposed.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <script src="https://apis.google.com/js/api:client.js"></script>
    <script src="{{ asset('js/hackoverflow.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('[data-toggle="popover"]').popover({html: true});
            startApp();
        });
        var googleUser = {};
        var startApp = function () {
            gapi.load('auth2', function () {
                auth2 = gapi.auth2.init({
                    client_id: '732115526464-it7hknll4or0fmhore01ud96ufkd9u2d.apps.googleusercontent.com',
                    cookiepolicy: 'single_host_origin'
                });
                attachSignin(document.getElementById('gLogin'));
            });
        };

        function attachSignin(element) {
            auth2.attachClickHandler(element, {},
                    function (googleUser) {
                        var profile = googleUser.getBasicProfile();
                        $(function () {
                            $.post("/login", {
                                token: googleUser.getAuthResponse().id_token,
                                _token: '{!! csrf_token() !!}'
                            }, function (data, status) {
                                window.location.href = "{!! session()->pull('url.intended', url('/')) !!}";
                            });
                        });
                    }, function (error) {
                        // ignore
                    });
        }
        function signOut() {
            $.get("/logout", function (data) {
                var auth2 = gapi.auth2.getAuthInstance();
                auth2.signOut().then(function () {
                    console.log('User signed out.');
                });
                window.location = "/";
            });
        }
    </script>
</head>

<body class="@yield('homepage')">

<header id="header">
    <div class="navbar" role="banner">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-6">
                    <div class="top-number"><p>
                            Hi, {!! Auth::check()? Auth::user()->given_name . " &nbsp;&nbsp;<a href='/profile' style='color: #fff; !important'><i class='fa fa-user'></i></a>&nbsp;&nbsp;&nbsp;" ." <a onclick='signOut()' href='#' style='color: #fff; !important'><i class='fa fa-sign-out'></i></a>": 'Guest' !!}
                        </p></div>
                </div>
                <div class="col-sm-6 col-xs-6">
                    <div class="social">
                        <ul class="social-share">
                            <li><a href="https://www.facebook.com/anuradha.sanjeewa" target="_blank"><i
                                            class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.twitter.com/anuradhawick" target="_blank"><i
                                            class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/anuradhawick" target="_blank"><i
                                            class="fa fa-linkedin"></i></a></li>
                        </ul>
                        <div class="search">
                            <form role="form">
                                <input type="text" class="search-form" autocomplete="off" placeholder="Search hackoverflow">
                                <i class="fa fa-search"></i>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-inverse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="{{asset('images/logo.png')}}" alt="logo"></a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown @yield('hackathon') @yield('meet') @yield('other')">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Events <i
                                    class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li class="@yield('hackathon')"><a href="/events/hackathons">Hackathon</a></li>
                            <li class="@yield('meet')"><a href="/events/meetups">Meet-Up</a></li>
                            <li class="@yield('other')"><a href="/events/other">Other</a></li>
                        </ul>
                    </li>
                    <li class="dropdown @yield('forum') @yield('forum_post')">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Forum <i
                                    class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li class="@yield('forum')"><a href="/forum">View </a></li>
                            <li class="@yield('forum_post')"><a href="/forum/post">New post</a></li>
                        </ul>
                    </li>
                    <li class="dropdown @yield('post_hack') @yield('post_meet') @yield('post_other')">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Post Event <i
                                    class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li class="@yield('post_hack')"><a href="/post-event/hackathon">Hackathon</a></li>
                            <li class="@yield('post_meet')"><a href="/post-event/meetup">Meet-Up</a></li>
                            <li class="@yield('post_other')"><a href="/post-event/other">Other</a></li>
                        </ul>
                    </li>
                    @if(!Auth::check())
                        <li class="@yield('login')"><a href="javascript:void(0)">
                                <div id="gLogin">Login/ Register</div>
                            </a></li>
                    @endif
                    <li class="@yield('aboutus')"><a href="/about-us">About Us</a></li>
                    <li class="@yield('contactus')"><a href="/contact-us">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>

</header>
@section('body_content')

@show
<section id="feature">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>Our Services</h2>
            <p class="lead">Get registered today and publish your event<br>
                Get registered to an event and show off your talents
            </p>
        </div>

        <div class="row">
            <div class="features">
                <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="feature-wrap">
                        <i class="fa fa-bullhorn"></i>
                        <h2>News for all</h2>
                        <h3>Get the information as and when they are published</h3>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="feature-wrap">
                        <i class="fa fa-comments"></i>
                        <h2>Express yourself</h2>
                        <h3>Start your discussion on Disqus and tell how you feel about events</h3>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="feature-wrap">
                        <i class="fa fa-mail-forward"></i>
                        <h2>Subscribe to our mailing list</h2>
                        <h3>Get emails notifications when events are available</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                &copy; 2016 <a target="_blank" href="http://shapebootstrap.net/"
                               title="Free Twitter Bootstrap WordPress Themes and HTML templates">DVios</a>.
                All Rights Reserved.
            </div>
            <div class="col-sm-6">
                <ul class="pull-right">
                    <li><a href="/">Home</a></li>
                    <li><a href="/about-us">About Us</a></li>
                    <li><a href="#">Faq</a></li>
                    <li><a href="/contact-us">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>


</body>
</html>