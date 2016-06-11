<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 6/11/16
 * Time: 20:08
 */
?>
@extends('layouts.master')
@section('title','Page not found')
@section('body_content')
    <section id="error" class="container text-center">
        <h1>403, Forbidden</h1>
        <p>Content you request is forbidden from access</p>
        <a class="btn btn-primary" href="/">GO BACK TO THE HOMEPAGE</a>
    </section>
@endsection
