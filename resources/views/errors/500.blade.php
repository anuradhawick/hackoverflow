<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 6/11/16
 * Time: 19:58
 */
?>

@extends('layouts.master')
@section('title','Server Error')
@section('body_content')
    <section id="error" class="container text-center">
        <h1>500, Server Error</h1>
        <p>Your request cannot be processed at the moment</p>
        <a class="btn btn-primary" href="/">GO BACK TO THE HOMEPAGE</a>
    </section>
@endsection
