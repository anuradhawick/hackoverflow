<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 6/11/16
 * Time: 20:04
 */

?>

@extends('layouts.master')
@section('title','Unauthorized')
@section('body_content')
    <section id="error" class="container text-center">
        <h1>401, Unauthorized</h1>
        <p>The request you have made is not authorized</p>
        <a class="btn btn-primary" href="/">GO BACK TO THE HOMEPAGE</a>
    </section>
@endsection