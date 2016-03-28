<?php
/**
 * Created by IntelliJ IDEA.
 * User: Anuradha
 * Date: 3/22/2016
 * Time: 10:49 PM
 */ ?>
@extends('layouts.master')
@section('title','Upcoming Hackathons')
@section('meet','active')
@section('body_content')
    <section id="blog" class="container">
        <div class="center wow fadeInDown">
            <div class="blog">
                <div class="row">
                    <div class="col-md-12">
                        @for($i=0;$i<5;$i++)
                            <div class="blog-item">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4 text-center">
                                        <div class="entry-meta">
                                            <span id="publish_date">07/03/2016</span>
                                            <span><i class="fa fa-user"></i> <a href="#">WSO2</a></span>
                                            {{--<span><i class="fa fa-comment"></i> <a href="blog-item.html#comments">2 Comments</a></span>--}}
                                            {{--<span><i class="fa fa-heart"></i><a href="#">56 Likes</a></span>--}}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-8 blog-content">
                                        {{--<a href="#"><img class="img-responsive img-blog" src="images/blog/blog1.jpg"--}}
                                        {{--width="100%" alt=""/></a>--}}
                                        <h2 class="text-left"><a href=""> Hackathon Name {{$i+1}}</a></h2>
                                        <h3 class="text-left">Hackathon details are as like this.Hackathon details are as like thisHackathon details are as like thisHackathon details are as like thisHackathon details are as like thisHackathon details are as like thisHackathon details are as like this</h3>
                                        <a class="btn btn-primary readmore" href="blog-item.html">Read More <i
                                                    class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div><!--/.blog-item-->
                        @endfor
                        <div class="text-center">
                            <ul class="pagination pagination-lg">
                                <li><a href="#"><i class="fa fa-long-arrow-left"></i>Previous Page</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">Next Page<i class="fa fa-long-arrow-right"></i></a></li>
                            </ul><!--/.pagination-->
                        </div>
                    </div><!--/.col-md-8-->

                </div><!--/.row-->
            </div>

        </div>
    </section><!--/#blog-->
@endsection