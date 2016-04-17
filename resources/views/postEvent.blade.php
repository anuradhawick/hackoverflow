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
    <section class="container">
        <div class="center wow fadeInDown">
            <div class="col-md-12">
                <h2>Create new forum post</h2>
                <hr>
                <form id="event_form" class="form-horizontal" method="post" action="">
                    <fieldset>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Name</label>
                            <div class="col-sm-8">
                                <input id="name" name="name" type="text"
                                       placeholder="eg: JAVA competitions"
                                       class="form-control input-md" required>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Forum name</label>
                            <div class="col-sm-8">
                                <input id="name" name="name" type="text"
                                       placeholder="eg: JAVA competitions"
                                       class="form-control input-md" required>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Forum name</label>
                            <div class="col-sm-8">
                                <input id="name" name="name" type="text"
                                       placeholder="eg: JAVA competitions"
                                       class="form-control input-md" required>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Forum name</label>
                            <div class="col-sm-8">
                                <input id="name" name="name" type="text"
                                       placeholder="eg: JAVA competitions"
                                       class="form-control input-md" required>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Forum name</label>
                            <div class="col-sm-8">
                                <input id="name" name="name" type="text"
                                       placeholder="eg: JAVA competitions"
                                       class="form-control input-md" required>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Forum name</label>
                            <div class="col-sm-8">
                                <input id="name" name="name" type="text"
                                       placeholder="eg: JAVA competitions"
                                       class="form-control input-md" required>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Forum name</label>
                            <div class="col-sm-8">
                                <input id="name" name="name" type="text"
                                       placeholder="eg: JAVA competitions"
                                       class="form-control input-md" required>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Forum name</label>
                            <div class="col-sm-8">
                                <input id="name" name="name" type="text"
                                       placeholder="eg: JAVA competitions"
                                       class="form-control input-md" required>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Forum name</label>
                            <div class="col-sm-8">
                                <input id="name" name="name" type="text"
                                       placeholder="eg: JAVA competitions"
                                       class="form-control input-md" required>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Forum name</label>
                            <div class="col-sm-8">
                                <input id="name" name="name" type="text"
                                       placeholder="eg: JAVA competitions"
                                       class="form-control input-md" required>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Forum name</label>
                            <div class="col-sm-8">
                                <input id="name" name="name" type="text"
                                       placeholder="eg: JAVA competitions"
                                       class="form-control input-md" required>
                            </div>
                        </div>

                        <!-- Textarea -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="post">Post</label>
                            <div class="col-sm-8">
                                                    <textarea class="form-control" id="post" name="post"
                                                              rows="15"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="btn"></label>
                            <div class="col-sm-1 col-sm-offset-6">
                                <button type="submit" class="btn btn-default btn-block">Post</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <hr>
            </div><!--/.row-->

        </div>
    </section><!--/#blog-->
    <script>
        $(document).ready(function(){
            $("#event_form").validate();
        });
    </script>
@endsection