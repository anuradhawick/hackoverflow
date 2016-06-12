<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 5/17/16
 * Time: 19:14
 */
?>
@extends('layouts.master')
@section('title','Profile')
@section('body_content')
    <script>
        $(document).ready(function () {
            $("#subscriptionUpdateForm").submit(function (form) {
                var hack = $("#hack").prop('checked');
                var meet = $("#meet").prop('checked');
                var other = $("#other").prop('checked');
                $.post('/subscriptions', {
                    hack: hack ? 1 : 0,
                    meet: meet ? 1 : 0,
                    other: other ? 1 : 0,
                    _token: '{{ csrf_token() }}'
                }, function (data, status) {
                    $("#alert").show();
                    setTimeout(function () {
                        $("#alert").slideUp(1000)
                    }, 1000);
                });
            });
        });

    </script>
    <section class="container">
        <div class="center wow fadeInDown">
            <div class="col-sm-12">
                <div class="col-sm-4" style="visibility: visible; animation-name: fadeInDown;">
                    <div class="clients-comments text-center">
                        <img src="{{ $user->picture }}" class="img-circle" alt="">
                        <h3></h3>
                        <h4><span>{{ $user->given_name. " ".$user->family_name }}</span></h4>
                        <h4><span>{{ $user->email }}</span></h4>
                    </div>
                </div>
                <div class="col-sm-8">
                    <h2>Update subscriptions</h2>
                    <hr>
                    <div id="alert" class="alert alert-danger" hidden>
                        <strong>Updated successfully</strong>
                    </div>
                    <form id="subscriptionUpdateForm" class="form-horizontal" onsubmit="return false;">
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="subscription">Subscriptions</label>
                                <div class="col-md-4">
                                    <div class="checkbox">
                                        <label for="subscription-0">
                                            <input type="checkbox" name="subscription" id="hack"
                                                   value="1" {{ $hack ? "checked":"" }}>
                                            Hackathon events
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="subscription-1">
                                            <input type="checkbox" name="subscription" id="meet"
                                                   value="2" {{ $meet ? "checked":"" }}>
                                            Meetup events
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="subscription-2">
                                            <input type="checkbox" name="subscription" id="other"
                                                   value="3" {{ $other ? "checked":"" }}>
                                            Other events
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="updateSubs"></label>
                                <div class="col-md-1">
                                    <button type="submit" id="updateSubs" name="updateSubs" class="btn btn-danger">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    <br>
                    <h2>My activity</h2>
                    <hr>
                    @if($user->admin==1)
                        <div class="col-sm-2 col-sm-offset-1">
                            <a href="/profile/forum" class="btn btn-danger btn-block">Forum posts</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="/profile/hackathons" class="btn btn-danger btn-block">Hackathons</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="/profile/meetups" class="btn btn-danger btn-block">Meetups</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="/profile/other" class="btn btn-danger btn-block">Other events</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="/admin" class="btn btn-danger btn-block">Admin page</a>
                        </div>
                    @else
                        <div class="col-sm-3">
                            <a href="/profile/forum" class="btn btn-danger btn-block">Forum posts</a>
                        </div>
                        <div class="col-sm-3">
                            <a href="/profile/hackathons" class="btn btn-danger btn-block">Hackathons</a>
                        </div>
                        <div class="col-sm-3">
                            <a href="/profile/meetups" class="btn btn-danger btn-block">Meetups</a>
                        </div>
                        <div class="col-sm-3">
                            <a href="/profile/other" class="btn btn-danger btn-block">Other events</a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection