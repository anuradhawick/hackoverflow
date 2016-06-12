<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 6/12/16
 * Time: 12:51
 */
?>
@section('admin.other','active')
@extends('admin_views.home')
@section('content')
    <div class="well col-sm-9">
        <h3>Forum posts</h3>
        <hr>
        @if($others->currentpage() > 1)
            <a href="{{ $others->previousPageUrl() }}" class="btn btn-danger btn-block">Previous </a>
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

            @foreach($others as $other)
                <tr>
                    <td>{{ $other->id }}</td>
                    <td><a target="_blank" href="/events/{{ $other->type }}/{{ $other->id }}">{{ $other->name }}</a></td>
                    <td><a href="" class="">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if($others->currentpage() < $others->lastPage())
            <a href="{{ $others->nextPageUrl() }}" class="btn btn-danger btn-block"> Next</a>
        @endif
    </div>
@endsection