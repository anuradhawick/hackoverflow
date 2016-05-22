<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 4/14/16
 * Time: 22:13
 */ ?>

@extends('layouts.master')
@section('title', $post->title)
@section('forum','active')
@section('body_content')

    <section class="container">
        <div class="center wow fadeInDown">
            <div class="col-md-12">
                <h2 style="text-align: left">{{ $post->title }}</h2>
                <hr>
                <div>
                    <h3 style="color: #000000; text-align: justify">{{ $post->post }}</h3>
                </div>
                <hr>
                <table class="table-responsive">
                    <thead class="">
                    <th></th>
                    <th></th>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="pull-left">Author &nbsp;&nbsp;</td>
                        <td style="text-align: left">
                            -&nbsp;&nbsp;{{ $user->fname. ' '.$user->mname.' '.$user->lname  }}</td>
                    </tr>
                    <tr>
                        <td class="pull-left">E-mail &nbsp;&nbsp;</td>
                        <td style="text-align: left">-&nbsp;&nbsp;{{ $user->email }}</td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <div class="pull-left">
                    <button type="button" id="likeButton" class="btn btn-danger left">Like post</button>
                    <span>&nbsp; <span id="likeCount"></span> people liked this post</span>
                </div>
                <br>
            </div>
            <hr>
            <div class="col-xs-12 col-sm-12">
                <div id="disqus_thread"></div>
                <script>
                    /**
                     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
                     */
                    var disqus_config = function () {
//                        this.page.url = "hackoverflow/forum/";  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = "{{ $post->uuid }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    (function () {  // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');

                        s.src = '//hackoverflow.disqus.com/embed.js';

                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                </script>
                <script>
                    $(document).ready(function () {
                        $("#likeButton").click(function () {
                            var likeBtn = $('#likeButton');
                            $.ajax({
                                type: "GET",
                                url: "/forum/like/",
                                async: true,
                                cache: false,
                                data: {like: (likeBtn.text() == 'Like post') ? 1 : 0, forumID: '{{ $post->id }}'},
                                timeout: 50000,
                                success: function (data) {
//                                    /forum/like?forumID=1&like=
                                },
                                error: function (XMLHttpRequest, textStatus, errorThrown) {
                                    if (errorThrown == 'Unauthorized') {
                                        window.location.replace("/forum/like?forumID={!! $post->id !!}&like=1");
                                    }
                                }
                            });
                        });
                        waitForMsg();
                    });

                    function waitForMsg() {
                        $.ajax({
                            type: "GET",
                            url: "/forum/likes",
                            async: true,
                            cache: false,
                            data: {forumID: "{{ $post->id }}"},
                            timeout: 50000,
                            success: function (data) {
                                $("#likeCount").text(data.likeCount);
                                buttonControl($.parseJSON(data.userLiked));
                                setTimeout(waitForMsg, 1000);
                            },
                            error: function (XMLHttpRequest, textStatus, errorThrown) {
                                setTimeout(waitForMsg, 15000);
                            }
                        });
                    }

                    function buttonControl(liked) {
                        var btn = $('#likeButton');
                        if (liked) {
                            if (btn.text() == 'Like post') {
                                btn.text('Unlike post');
                                btn.button('toggle');
                            }
                        } else {
                            if (btn.text() == 'Unlike post') {
                                btn.text('Like post');
                                btn.button('toggle');
                            }
                        }
                    }
                </script>

            </div>
        </div>
    </section>
@endsection