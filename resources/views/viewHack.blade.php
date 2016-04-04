<?php
/**
 * Created by IntelliJ IDEA.
 * User: Anuradha
 * Date: 3/29/2016
 * Time: 4:05 PM
 */ ?>
@extends('layouts.master')
@section('title','Upcoming Hackathons')
@section('hackathon','active')
@section('body_content')
    <br>
    <br>
    <div class="center wow fadeInDown">
        <div class="blog container">
            <div class="row">
                <div class="blog-item">

                    <div class="row">
                        <div class="col-xs-12 col-sm-4 text-center">
                            <div class="entry-meta">
                                <span id="publish_date">07  NOV</span>
                                <span><i class="fa fa-user"></i> <a href="#"> John Doe</a></span>
                                <span><i class="fa fa-comment"></i> <a href="blog-item.html#comments">2
                                        Comments</a></span>
                                <span><i class="fa fa-heart"></i><a href="#">56 Likes</a></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-8">
                            <img class="img-responsive img-blog"
                                 src="http://www.itinterns.org/wp-content/uploads/2015/06/oneneck-end-to-end-it-solutions.jpg"
                                 alt="Flier" style="margin: 0 auto;"/>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 blog-content">
                            <h2>Registrtion form for hackathon id = {{$hackID or 'Not mentioned'}}</h2>
                            <div class="row">
                                <div style="margin: 0 auto;">
                                    <iframe src="https://docs.google.com/forms/d/1dtYGZoKRNIhAxAsJdqQCf5z7uPtyXMaNcxBBFEqUGVk/viewform?embedded=true"
                                            width="760" height="1000" frameborder="0" marginheight="0" marginwidth="0">
                                        Loading...
                                    </iframe>
                                </div>
                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div id="disqus_thread"></div>
                            <script>
                                /**
                                 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
                                 */
                                /*
                                 var disqus_config = function () {
                                 this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                 this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                 };
                                 */
                                (function () {  // DON'T EDIT BELOW THIS LINE
                                    var d = document, s = d.createElement('script');

                                    s.src = '//binarymathematics.disqus.com/embed.js';

                                    s.setAttribute('data-timestamp', +new Date());
                                    (d.head || d.body).appendChild(s);
                                })();
                            </script>
                            <div class="post-tags">
                                <strong>Tag:</strong> <a href="#">Cool</a> / <a href="#">Creative</a> / <a
                                        href="#">Dubttstep</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
