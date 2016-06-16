<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 6/16/16
 * Time: 21:53
 */
?>
@section('admin.addAdmin','active')
@extends('admin_views.home')
@section('content')
    <script !src="">
        $(document).ready(function () {
            $("#admin_form").keyup(function (event) {
                if ($("#email").val().length > 3) {
                    $.ajax({
                        url: '/admin/see_users/',
                        data: $(this).serialize(),
                        type: 'GET',
                        success: function (data) {
                            $("#emails").empty();
                            $.each(data, function (index, value) {
                                $("#emails").append($("<option></option>").attr('value', value.email));
                            });
                        }
                    });
                }
            });
            $(".remove").click(function (event) {
//                var obj = $(this).parent().parent();
                $.ajax({
                    url: '/admin/administration',
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        action: 'remove',
                        email: $(this).parent().parent().find("td:nth-child(4)").text()
                    },
                    success: function () {
                        $("#alert_text_removal").text('Successfully removed the admin');
                        $("#alert_removal").show();
                        setTimeout(function () {
                            $("#alert_removal").slideUp(1000);
//                            obj.find("td:parent").remove()
                            window.location.href = window.location.href;
                        }, 1000);
                    },
                    error: function (error) {
                        $("#alert_text_removal").text('Failed to remove the admin');
                        $("#alert_removal").show();
                        setTimeout(function () {
                            $("#alert_removal").slideUp(1000);
                        }, 1000);
                    }
                });
            });

            $('#admin_form').validate({
                submitHandler: function () {
                    $.ajax({
                        url: '/admin/administration',
                        type: 'POST',
                        data: $('#admin_form').serialize(),
                        success: function (data) {
                            $("#alert_text").text('Successfully added the admin');
                            $("#alert").show();
                            setTimeout(function () {
                                $("#alert").slideUp(1000);
                                window.location.href = window.location.href;
                            }, 1000);
                        },
                        error: function (error) {
                            $("#alert_text").text('Could not find the user');
                            $("#alert").show();
                            setTimeout(function () {
                                $("#alert").slideUp(1000)
                            }, 1000);
                        }
                    });
                }
            });
        });
    </script>
    <div class="well col-sm-9">
        <h3>Administration</h3>
        <hr>
        <div id="alert_removal" class="alert alert-danger" hidden>
            <strong id="alert_text_removal"></strong>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td style="vertical-align: middle">{{ $admin->id }}</td>
                    <td style="vertical-align: middle"><img src="{{ asset($admin->picture) }}" height="40px"
                                                            width="40px" class="img-thumbnail"></td>
                    <td style="vertical-align: middle"><a href="javascript:void(0)">{{ $admin->name }}</a></td>
                    <td style="vertical-align: middle"><a href="javascript:void(0)">{{ $admin->email }}</a></td>
                    <td style="vertical-align: middle"><a href="javascript:void(0)" class="remove">Remove</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <hr>
        <h3>Add admin</h3>
        <hr>
        <div id="alert" class="alert alert-danger" hidden>
            <strong id="alert_text"></strong>
        </div>
        <form id="admin_form" class="form-horizontal" onsubmit="return false">
            <fieldset>
                {{ csrf_field() }}
                <input type="hidden" name="action" value="add">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="email">Email address: </label>
                    <div class="col-sm-8">
                        <input id="email" name="email" type="email" class="form-control input-md" required
                               maxlength="30" list="emails" autocomplete="off">
                        <datalist id="emails">

                        </datalist>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="btn"></label>
                    <div class="col-sm-2 col-sm-offset-5">
                        <button type="submit" class="btn btn-default btn-block">Add</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
