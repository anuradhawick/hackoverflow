<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 6/11/16
 * Time: 19:58
 */
?>

@extends('layouts.master')
@section('title','Page not found')
@section('body_content')
    <section id="error" class="container text-center">
        <h1>404, Page not found</h1>
        <p>The Page you are looking for doesn't exist or an other error occurred.</p>
        <a class="btn btn-primary" href="/">GO BACK TO THE HOMEPAGE</a>
    </section>
@endsection
