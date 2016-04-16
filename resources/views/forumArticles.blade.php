<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 4/14/16
 * Time: 22:13
 */ ?>

@extends('layouts.master')
@section('title','Post in forum')
@section('forum','active')
@section('body_content')

    <section class="container">
        <div class="center wow fadeInDown">
            <div class="blog">
                <div class="row">
                    <div class="col-md-12">
                        @foreach($posts as $post)
                            <div class="blog-item">
                                <div class="row">
                                    <div class="col-sm-10 blog-content">
                                        <h2 class="text-left"><a href="{{ '/forum/' . $post->id }}">{{ $post->title }}</a>
                                        </h2>
                                        <h3 class="text-left">{{ substr($post->post, 0, 100).'...' }}</h3>
                                    </div>
                                </div>
                            </div><!--/.blog-item-->
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
                    </div><!--/.col-md-8-->

                </div><!--/.row-->
            </div>
        </div>
    </section>

@endsection