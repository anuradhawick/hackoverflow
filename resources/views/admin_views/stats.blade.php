<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 6/12/16
 * Time: 11:41
 */
?>
@section('admin.home','active')
@extends('admin_views.home')
@section('content')
    <div class="well col-sm-9">
        <div>
            <h3>Stats</h3>
            <hr>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th width="50%">Category</th>
                    <th>Value</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>No of users</td>
                    <td>{{ $object->user_count or 'ERROR' }}</td>
                </tr>
                <tr>
                    <td>No of forum posts</td>
                    <td>{{ $object->forum_count or 'ERROR' }}</td>
                </tr>
                <tr>
                    <td>No of total likes</td>
                    <td>{{ $object->like_count or 'ERROR' }}</td>
                </tr>
                <tr>
                    <td>No of hackathons posts</td>
                    <td>{{ $object->hack_count or 'ERROR' }}</td>
                </tr>
                <tr>
                    <td>No of meetup posts</td>
                    <td>{{ $object->meetup_count or 'ERROR' }}</td>
                </tr>
                <tr>
                    <td>No of other posts</td>
                    <td>{{ $object->other_count or 'ERROR' }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
