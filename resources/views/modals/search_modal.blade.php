<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 6/13/16
 * Time: 20:07
 */
?>
@extends('layouts.modal_body')
@section('modal_header','Search results for "'. $key.'"')
@section('content')
    <script>
        $.ajax({
            url: '/search/events',
            data: {key: "{{ $key }}"},
            success: function (data) {
                $('#events_table').html(data);
            },
            complete: function () {
                $('#event_loader').hide();
            }
        });

        $.ajax({
            url: '/search/forum',
            data: {key: "{{ $key }}"},
            success: function (data) {
                $('#forum_table').html(data);
            },
            complete: function () {
                $('#forum_loader').hide();
            }
        });

        $(document).on('click', '.event_page', function (event) {
            event.preventDefault();
            $('#events_table').empty();
            $('#event_loader').show();
            $.ajax({
                url: $(this).attr('href'),
                data: {key: "{{ $key }}"},
                success: function (data) {
                    $('#events_table').html(data);
                },
                complete: function () {
                    $('#event_loader').hide();
                }
            });
        });

        $(document).on('click', '.forum_page', function (event) {
            event.preventDefault();
            $('#forum_table').empty();
            $('#forum_loader').show();
            $.ajax({
                url: $(this).attr('href'),
                data: {key: "{{ $key }}"},
                success: function (data) {
                    $('#forum_table').html(data);
                },
                complete: function () {
                    $('#forum_loader').hide();
                }
            });
        });
    </script>
    <div class="container">
        <ul class="nav nav-pills">
            <li class="active"><a data-toggle="tab" href="#events">Events</a></li>
            <li><a data-toggle="tab" href="#forum">Forum</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div id="events" class="tab-pane fade in active">
            <img id="event_loader" src="{{ asset('/images/loader.gif') }}" style="margin: auto; display: block" alt="">
            <div id="events_table">

            </div>
        </div>
        <div id="forum" class="tab-pane fade">
            <img id="forum_loader" src="{{ asset('/images/loader.gif') }}" style="margin: auto; display: block" alt="">
            <div id="forum_table">

            </div>
        </div>
    </div>
@endsection
