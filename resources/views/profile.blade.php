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
    <?php
    $user = Auth::user();
    $hack = false;
    $meet = false;
    $other = false;
    foreach (json_decode($user->subscriptions, true) as $sub) {
        if ($sub['event_type'] == "hack") {
            $hack = true;
        }
        if ($sub['event_type'] == "meet") {
            $meet = true;
        }
        if ($sub['event_type'] == "other") {
            $other = true;
        }
    }
    ?>
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
                });
            });
        });
    </script>
    <section class="container">
        <div class="center wow fadeInDown">
            <div class="col-md-12">
                <div class="col-md-4" style="visibility: visible; animation-name: fadeInDown;">
                    <div class="clients-comments text-center">
                        <img src="{{ $user->picture }}" class="img-circle" alt="">
                        <h3></h3>
                        <h4><span>{{ $user->given_name. " ".$user->family_name }}</span></h4>
                        <h4><span>{{ $user->email }}</span></h4>
                    </div>
                </div>
                <div class="col-md-8">
                    <div id="alert" class="alert alert-danger" hidden>
                        <strong>Updated successfully</strong>
                    </div>
                    <form id="subscriptionUpdateForm" class="form-horizontal" onsubmit="return false;">
                        <fieldset>
                            <!-- Form Name -->
                            <legend>Update details</legend>

                            <!-- Multiple Checkboxes -->
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

                </div>
            </div>
        </div>
    </section>
@endsection