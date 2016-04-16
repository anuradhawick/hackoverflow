<?php
/**
 * Created by IntelliJ IDEA.
 * User: Anuradha
 * Date: 3/22/2016
 * Time: 10:49 PM
 */ ?>
@extends('layouts.master')
@if($type==1)
    @section('title','Upcoming Hackathons')
@section('hackathon','active')
@elseif($type==2)
    @section('title','Upcoming Meetups')
@section('meet','active')
@elseif($type==3)
    @section('title','Other events')
@section('other','active')
@endif
@section('body_content')
    <section id="blog" class="container">
        <div class="center wow fadeInDown">
            <div class="blog">
                <div class="row">
                    <div class="col-md-12">
                        @if(sizeof($events) < 1)
                            <div class="blog-item">
                                <div class="row">
                                    <div class="col-sm-12 blog-content">
                                        <h2 class="text-center">
                                            There are no events at the moment, keep looking :)
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        @else
                            @foreach($events as $e)
                                <div class="blog-item">
                                    <div class="row">
                                        <div class="col-sm-10 blog-content">
                                            <h2 class="text-left"><a
                                                        href="/events/{{ $e->type }}/{{ $e->id }}">{{ $e->name }}</a>
                                            </h2>
                                            <h3 class="text-left">
                                                {{ substr($e->event_info->description ,0,100).'...' }}
                                                <br>
                                                On: {{ $e->event_info->event_date }}
                                            </h3>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
                        @endif
                    </div><!--/.col-md-8-->

                </div><!--/.row-->
            </div>

        </div>
    </section><!--/#blog-->
@endsection