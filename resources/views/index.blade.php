<?php
/**
 * Created by IntelliJ IDEA.
 * User: Anuradha
 * Date: 3/22/2016
 * Time: 1:47 PM
 */
?>

@extends('layouts.master')
@section('title','Welcome to HackOverflow')
@section('homepage','homepage')

@section('body_content')
    <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">

                <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Spread the news to unleash the coding talents around the country</h1>
                                    <h2 class="animation animated-item-2">The only single place to know about all the IT related events and competitions in Sri Lanka.</h2>
                                    {{--<a class="btn-slide animation animated-item-3" href="#">Read More</a>--}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(images/slider/bg2.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Unite the nation's IT professionals</h1>
                                    <h2 class="animation animated-item-2">Effective communication of ongoing IT related events to all the stakeholders.</h2>
                                    {{--<a class="btn-slide animation animated-item-3" href="#">Read More</a>--}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(images/slider/bg3.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Improving the innovation through infotainment</h1>
                                    <h2 class="animation animated-item-2">Improve the innovation through the increased user base and participation on meet-ups and hackathons, thus inreasing the innovation among Sri Lankan IT youth.</h2>
                                    {{--<a class="btn-slide animation animated-item-3" href="#">Read More</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->

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
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-comments"></i>
                            <h2>Express yourself</h2>
                            <h3>Start your discussion on Disqus and tell how you feel about events</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-mail-forward"></i>
                            <h2>Subscribe to our mailing list</h2>
                            <h3>Get emails notifications when events are available</h3>
                        </div>
                    </div><!--/.col-md-4-->
                </div><!--/.services-->
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#feature-->






    <section id="conatcat-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="pull-left">
                            <i class="fa fa-info"></i>
                        </div>
                        <div class="media-body">
                            <h2>Want to get crowd for your hackathon, meet-up or event?</h2>
                            <p>Get registered in our site and post your event. Get more crowd and popularity.
                             See what others think of your hackathon. :) </p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.container-->
    </section><!--/#conatcat-info-->

@endsection