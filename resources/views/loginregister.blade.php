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
    <script>
        $(document).ready(function () {
            $("#errorLogin").click(function () {
                $("#gLogin").trigger("click");
            });
        });
    </script>
    <section id="about-us">
        <div class="container">
            <div class="center wow fadeInDown">
                @if (session('error'))
                    <div class="row">
                        <div class="alert alert-danger col-sm-8 col-sm-offset-2">
                            <strong>{{ session()->pull('error') }} <a id="errorLogin" class="btn btn-danger">Login </a></strong>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="alert alert-danger col-sm-8 col-sm-offset-2">
                            <strong>You can login to HackOverflow from here: <a id="errorLogin" class="btn btn-danger">Login </a></strong>
                        </div>
                    </div>
                @endif
                <div>

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
                    regEmail: {
                        required: true,
                        email: true,
                        remote: {
                            url: "/check/",
                            type: "get"
                        }
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
                    },
                    regEmail: {
                        remote: 'The email address is already occupied, Please login!s'
                    }
                }
            });
        });
    </script>
@endsection
