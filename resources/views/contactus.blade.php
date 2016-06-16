<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 5/4/16
 * Time: 02:14
 */
?>
@extends('layouts.master')
@section('title','Contact us')
@section('contactus','active')
@section('body_content')
    <script !src="">
        $(document).ready(function () {
            $("#fm").validate({
                submitHandler: function () {
                    $.post('/contact-us', $('#fm').serialize(), function (data, success) {
                        $("#alert").show();
                        setTimeout(function () {
                            $("#alert").slideUp(1000)
                        }, 1000);
                    });
                }
            });
        });
    </script>
    <section id="contact-info">
        <div class="center">
            <h2>Want to Reach Us?</h2>
            <p class="lead">Ask us anything or give us feedback, we are listening to you.</p>
        </div>
        <div class="gmap-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 text-center">
                        <div class="gmap">
                            <iframe
                                    width="450"
                                    height="250"
                                    frameborder="0" style="border:0"
                                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDQeQoyQxTqHmDRYX1RG_WZ1-CB5rNLfrw&q=7.045233,79.957629"
                                    allowfullscreen>
                            </iframe>
                        </div>
                    </div>

                    <div class="col-sm-7 map-content">
                        <ul class="row">
                            <li class="col-sm-6">
                                <address>
                                    <h5>Head Office</h5>
                                    <p>387/23, Pokuna Junction, <br>
                                        Kadawatha Road,<br>
                                        Ganemulla 11020</p>
                                    <p>Phone: (+94) 0712 165 724<br>
                                        Email Address: anuradhawick@gmail.com</p>
                                </address>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact-page">
        <div class="container">
            <div class="center">
                <h2>Drop Your Message</h2>
                <p class="lead">We will get back to you.</p>
            </div>
            <div class="row">
                <div id="alert" class="alert alert-danger" hidden>
                    <strong>Submitted successfully</strong>
                </div>
                <form id="fm" name="contact-form" onsubmit="return false;">
                    {{ csrf_field() }}
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" name="name" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="tel" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" name="company" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Subject *</label>
                            <input type="text" name="subject" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Message *</label>
                            <textarea name="message" id="message" required="required" class="form-control"
                                      rows="8"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">
                                Submit Message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection