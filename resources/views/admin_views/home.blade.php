<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 6/12/16
 * Time: 10:45
 */
?>
@extends('layouts.master')
@section('title','Admin page')
@section('body_content')
    <div class="container">
        <br>
        <div class="well col-sm-3">
            <div class="list-group">
                <a href="/admin/" class="list-group-item @yield('admin.home')">Home</a>
                <a href="/admin/forum/" class="list-group-item @yield('admin.forum')">Forum posts</a>
                <a href="/admin/hack/" class="list-group-item @yield('admin.hack')">Hackathons</a>
                <a href="/admin/meet/" class="list-group-item @yield('admin.meet')">Meetups</a>
                <a href="/admin/other/" class="list-group-item @yield('admin.other')">Other events</a>
                <a href="/admin/administration/" class="list-group-item @yield('admin.addAdmin')">Administration</a>
                {{--<a href="/admin/errors/" class="list-group-item @yield('admin.error')">Error log</a>--}}
                {{--<a href="/admin/reports/" class="list-group-item @yield('admin.report')">Reporting</a>--}}
            </div>
        </div>
        @section('content')
        @show
    </div>
@endsection