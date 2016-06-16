<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 4/14/16
 * Time: 22:13
 */ ?>

@extends('layouts.master')
@section('title','Post in forum')
@section('forum_post','active')
@section('body_content')

    <section class="container">
        <div class="center wow fadeInDown">
            <div class="col-md-12">
                <h2>Create new forum post</h2>
                <hr>
                <form id="forum_form" class="form-horizontal" method="post" action="">
                    <fieldset>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Forum name</label>
                            <div class="col-sm-8">
                                <input id="name" name="name" type="text"
                                       placeholder="eg: JAVA competitions"
                                       class="form-control input-md" required maxlength="30">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="post">Post</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="post" name="post" rows="15" maxlength="1500"></textarea>
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
            </div>

        </div>
    </section>
    <script>
        $(document).ready(function () {
            $("#forum_form").validate();
        });
    </script>
@endsection