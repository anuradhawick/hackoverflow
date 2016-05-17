<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 5/17/16
 * Time: 19:14
 */
?>
@extends('layouts.master')
@section('title','Profile')
@section('body_content')
    <?php
            $user = Auth::user();
    ?>
    <section class="container">
        <div class="center wow fadeInDown">
            <div class="col-md-12">
                <div class="col-md-4" style="visibility: visible; animation-name: fadeInDown;">
                    <div class="clients-comments text-center">
                        <img src="{{ asset('images/anu.jpg') }}" class="img-circle" alt="">
                        <h3></h3>
                        <h4><span>{{ $user->fname. " ".$user->mname." ".$user->lname }}</span></h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <p>This is a text</p>
                </div>
            </div>
        </div>
    </section>
@endsection