<?php
/**
 * Created by IntelliJ IDEA.
 * User: Anuradha
 * Date: 3/22/2016
 * Time: 4:42 PM
 */ ?>
@extends('layouts.master')
@section('title','Join/ Register HackOverflow')
@section('login','active')
@section('body_content')
    <section id="about-us">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>Login</h2>
                @if (session('error'))
                    <div class="row">
                        <div class="alert alert-danger col-sm-8 col-sm-offset-2">
                            <strong>{{ session('error') }}</strong>
                        </div>
                    </div>
                @endif
                <div class="features">
                    <form id="login_form" class="form-horizontal" method="post" action="">
                        <fieldset>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="username">E-mail address</label>
                                <div class="col-md-4">
                                    <input id="email" name="email" type="text" placeholder="email address"
                                           class="form-control input-md" minlength="6" required>

                                </div>
                            </div>

                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="password">Password</label>
                                <div class="col-md-4">
                                    <input id="password" name="password" type="password" placeholder="password"
                                           class="form-control input-md" minlength="6" required>

                                </div>
                            </div>

                            <!-- Remember Checkbox -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="rememberme"></label>
                                <div class="col-md-4">
                                    <div class="checkbox">
                                        <label for="rememberme-0">
                                            <input type="checkbox" name="rememberme" id="rememberme" value="1">
                                            <span>Remember me</span>
                                        </label>
                                    </div>
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
                <h2>Join us</h2>
                <div class="features">
                    <form id="register_form" class="form-horizontal">
                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="fname">First name</label>
                                <div class="col-md-4">
                                    <input id="fname" name="fname" type="text" placeholder="First name"
                                           class="form-control input-md" required>

                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="mname">Middle name</label>
                                <div class="col-md-4">
                                    <input id="mname" name="mname" type="text" placeholder="Middle name"
                                           class="form-control input-md" required>

                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="lname">Last name</label>
                                <div class="col-md-4">
                                    <input id="lname" name="lname" type="text" placeholder="Last name"
                                           class="form-control input-md" required>

                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="company">Organization</label>
                                <div class="col-md-4">
                                    <input id="company" name="company" type="text"
                                           placeholder="eg: ABC LTD, or keep blank"
                                           class="form-control input-md">

                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="tel">Contact number</label>
                                <div class="col-md-4">
                                    <input id="tel" name="tel" type="text" placeholder="eg: 0712345678"
                                           class="form-control input-md" required>

                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="username">Username <i
                                            class="fa fa-check-circle-o"></i></label>
                                <div class="col-md-4">

                                    <input id="username" name="username" type="text" placeholder="username"
                                           class="form-control input-md" required="">

                                </div>
                            </div>

                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="password">Password</label>
                                <div class="col-md-4">
                                    <input id="password" name="password" type="password" placeholder="password"
                                           class="form-control input-md" required>

                                </div>
                            </div>

                            <!-- Confirm password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="cpassword">Confirm password</label>
                                <div class="col-md-4">
                                    <input id="cpassword" name="cpassword" type="password" placeholder="retype password"
                                           class="form-control input-md" required>

                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="singlebutton"></label>
                                <div class="col-md-1 col-sm-offset-3">
                                    <button class="btn btn-default btn-block">Sign-up
                                    </button>
                                </div>
                            </div>

                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function () {
            $("#login_form").validate();
            $("#register_form").validate({
                rules: {
                    cpassword: {
                        equalTo: $('#register_form').find("#password"),
                        minlength: 6
                    },
                    username: {
                        minlength: 6
                    },
                    password: {
                        minlength: 6
                    },
                    tel: {
                        digits: true,
                        minlength: 10,
                        maxlength: 10
                    }
                },
                messages: {
                    cpassword: {
                        equalTo: 'Passwords do not match'
                    },
                    tel: {
                        minlength: 'Please enter a valid telephone number'
                    }
                }
            });
        });
    </script>
@endsection
