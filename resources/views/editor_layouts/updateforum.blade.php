<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 5/26/16
 * Time: 15:50
 */
?>
@extends('layouts.master')
@section('title','Edit forum post')
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
                                       class="form-control input-md" value="{{ $title }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="post">Post</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="post" name="post" rows="15">{{ $post }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="btn"></label>
                            <div class="col-sm-1 col-sm-offset-5">
                                <button type="submit" name="submit" class="btn btn-default btn-block" value="update">Update</button>
                            </div>
                            <div class="col-sm-1">
                                <button type="submit" name="submit" class="btn btn-default btn-block" value="delete">Delete</button>
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
