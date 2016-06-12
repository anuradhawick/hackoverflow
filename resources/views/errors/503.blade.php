<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 6/11/16
 * Time: 19:58
 */
?>

@extends('layouts.master')
@section('title','Service Unavailable')
@section('body_content')
    <section id="error" class="container text-center">
        <h1>503, Service Unavailable</h1>
        <p>The server is currently unavailable (overloaded or down)</p>
        <a class="btn btn-primary" href="/">GO BACK TO THE HOMEPAGE</a>
    </section>
@endsection
