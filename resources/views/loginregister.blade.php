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
                <div class="features">
                    <form class="form-horizontal">
                        <fieldset>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="username">Username</label>
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
                                           class="form-control input-md" required="">

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
                                <div class="col-md-4">
                                    <button id="" name="" class="btn btn-default">Login
                                    </button>
                                </div>
                            </div>

                        </fieldset>
                    </form>

                </div>
                <hr>
                <h2>Join us</h2>
                <div class="features">
                    <form class="form-horizontal">
                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="username">First name</label>
                                <div class="col-md-4">
                                    <input id="username" name="username" type="text" placeholder="First name"
                                           class="form-control input-md" required="">

                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="username">Middle name</label>
                                <div class="col-md-4">
                                    <input id="username" name="username" type="text" placeholder="Middle name"
                                           class="form-control input-md" required="">

                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="username">Last name</label>
                                <div class="col-md-4">
                                    <input id="username" name="username" type="text" placeholder="Last name"
                                           class="form-control input-md" required="">

                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="username">Organization</label>
                                <div class="col-md-4">
                                    <input id="username" name="username" type="text"
                                           placeholder="eg: ABC LTD, or keep blank"
                                           class="form-control input-md">

                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="username">Contact number</label>
                                <div class="col-md-4">
                                    <input id="username" name="username" type="text" placeholder="eg: 0712345678"
                                           class="form-control input-md">

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
                                           class="form-control input-md" required="">

                                </div>
                            </div>

                            <!-- Confirm password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="password">Confirm password</label>
                                <div class="col-md-4">
                                    <input id="password" name="password" type="password" placeholder="retype password"
                                           class="form-control input-md" required="">

                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="singlebutton"></label>
                                <div class="col-md-4">
                                    <button id="" name="" class="btn btn-default">Sign-up
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
