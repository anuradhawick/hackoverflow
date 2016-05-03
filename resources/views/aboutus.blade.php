<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 5/4/16
 * Time: 01:32
 */
?>
@extends('layouts.master')
@section('title','About us')
@section('aboutus','active')
@section('body_content')
    <section id="about-us">
        <div class="container">
            <!-- our-team -->
            <div class="team">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 wow fadeInDown">
                        <div class="clients-comments text-center">
                            <img src="{{ asset('images/anu.jpg') }}" class="img-circle" alt="">
                            <h3>
                                <h4><span>Anuradha Sanjeewa Wickramarachchi</span></h4>
                                Computer Science and Engineering (UoM ug) <br>
                                CIMA advanced diploma in MA <br>
                                <a href="https://lk.linkedin.com/in/anuradhawick" target="_blank"><i
                                            class="fa fa-linkedin-square fa-4x"></i></a>
                                <a href="https://www.facebook.com/anuradha.sanjeewa" target="_blank"><i
                                            class="fa fa-facebook-square fa-4x"></i></a>
                                <a href="https://www.twitter.com/Anuradhawick" target="_blank"><i class="fa fa-twitter-square fa-4x"></i></a>
                                <a href="https://www.instagram.com/Anuradhasanjeewa" target="_blank"><i class="fa fa-instagram fa-4x"></i></a><br>
                                <a href="tel:+94712165724">(+94) 0712 165 724 </a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="get-started center wow fadeInDown animated"
                 style="visibility: visible; animation-name: fadeInDown;">
                <h2>Our Vision</h2>
                <p class="lead">Be the leading technical event publishing site enabling Sri Lankan young IT generation
                    to display their talents. <br> Be the first to get the news for you.</p>
                <div class="request">
                    <h4><a href="javascript:void(0)">&nbsp;&nbsp;Bring ideas on stage&nbsp;&nbsp;</a></h4>
                </div>
            </div>
            <br>
            <br>
            <div class="get-started center wow fadeInDown animated"
                 style="visibility: visible; animation-name: fadeInDown;">
                <h2>Our Mission</h2>
                <p class="lead">Collect all the events to a single platform and organize forums to bring our the hot
                    topic for the discussion. <br> Because opportunities are to be taken</p>
                <div class="request">
                    <h4><a href="javascript:void(0)"> &nbsp;&nbsp;&nbsp; Proceed with pride.&nbsp;&nbsp;&nbsp;</a></h4>
                </div>
            </div>
        </div><!--/.container-->
    </section><!--/about-us-->
@endsection
