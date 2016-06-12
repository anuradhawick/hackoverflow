<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 6/12/16
 * Time: 12:18
 */
?>
@section('admin.hack','active')
@extends('admin_views.home')
@section('content')
    <script !src="">
        $(document).ready(function () {
            $(".deleteForumPost").click(function () {
                $.ajax({
                    type: 'POST',
                    async: false,
                    url: '/admin/delete_hack',
                    data: {
                        id: $(this).parent().parent().find("td:nth-child(1)").text(), _token: '{{csrf_token()}}'
                    },
                    success: function (result, status, xhr) {
                        window.location.href = window.location.href;
                    },
                    error: function (xhr, status, error) {
                        return;
                    }
                });
            });
        });
    </script>
    <div class="well col-sm-9">
        <h3>Hackathon posts</h3>
        <hr>
        @if($hacks->currentpage() > 1)
            <a href="{{ $hacks->previousPageUrl() }}" class="btn btn-danger btn-block">Previous </a>
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

            @foreach($hacks as $hack)
                <tr>
                    <td>{{ $hack->id }}</td>
                    <td><a target="_blank" href="/events/{{ $hack->type }}/{{ $hack->id }}">{{ $hack->name }}</a></td>
                    <td><a href="javascript:void(0)" class="deleteForumPost">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if($hacks->currentpage() < $hacks->lastPage())
            <a href="{{ $hacks->nextPageUrl() }}" class="btn btn-danger btn-block"> Next</a>
        @endif
    </div>
@endsection
