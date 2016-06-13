<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 6/13/16
 * Time: 20:07
 */
?>
@extends('layouts.modal_body')
@section('modal_header','Search results: '. $key)
@section('content')
    <table class="table table-hover" width="100%">
        <thead>
        <tr>
            <th width="20%">Even type</th>
            <th width="30%">Name</th>
            <th width="50%">Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <td><a target="_blank" href="/events/{{ $event->type }}">{{ studly_case($event->type) }}</a></td>
                <td><a target="_blank" href="/events/{{ $event->type }}/{{ $event->id }}">{{ $event->name }}</a></td>
                <td><a href="javascript:void(0)"></a>{{ $event->description }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
