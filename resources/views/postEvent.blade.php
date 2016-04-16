<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 4/15/16
 * Time: 00:44
 */ ?>
@extends('layouts.master')
@if($type == 'hackathon')
    @section('post_hack','active')
@elseif($type == 'meetup')
    @section('post_meet','active')
@elseif($type == 'other')
    @section('post_other','active')
@endif
@section('title','Post '.$type. ' event')
@section('body_content')
    <section id="post_event">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>Post {{$type or 'Error'}} event</h2>
                <hr>
                <div class="features">
                    <form id="login_form" class="form-horizontal">
                        <fieldset>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="username">Username</label>
                                <div class="col-md-4">
                                    <input id="username" name="username" type="text" placeholder="username"
                                           class="form-control input-md" minlength="6" required>

                                </div>
                            </div>





                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="singlebutton"></label>
                                <div class="col-md-1 col-sm-offset-3">
                                    <button id="" name="" class="btn btn-default btn-block">Login
                                    </button>
                                </div>
                            </div>

                        </fieldset>
                    </form>

                </div>
                <hr>
            </div>
        </div>
    </section>
@endsection