<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 6/12/16
 * Time: 12:46
 */
?>
@section('admin.meet','active')
@extends('admin_views.home')
@section('content')
    <div class="well col-sm-9">
        <h3>Forum posts</h3>
        <hr>
        @if($meets->currentpage() > 1)
            <a href="{{ $meets->previousPageUrl() }}" class="btn btn-danger btn-block">Previous </a>
        @endif
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($meets as $meet)
                <tr>
                    <td>{{ $meet->id }}</td>
                    <td><a target="_blank" href="/events/{{ $meet->type }}/{{ $meet->id }}">{{ $meet->name }}</a></td>
                    <td><a href="" class="">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if($meets->currentpage() < $meets->lastPage())
            <a href="{{ $meets->nextPageUrl() }}" class="btn btn-danger btn-block"> Next</a>
        @endif
    </div>
@endsection