<?php
/**
 * Created by IntelliJ IDEA.
 * User: Anuradha
 * Date: 3/29/2016
 * Time: 4:05 PM
 */ ?>
@extends('layouts.master')
@if($type==1)
    @section('title','Upcoming Hackathon')
@section('hackathon','active')
@elseif($type==2)
    @section('title','Upcoming Meetup')
@section('meet','active')
@elseif($type==3)
    @section('title','Other event')
@section('other','active')
@endif
@section('og-tags')
    <meta property="og:url"
          content="{{ request()->url() }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{ $event->name }}"/>
    <meta property="og:description" content="{{ $event->event_info->description }}"/>
    <meta property="fb:app_id" content="1156762864333767"/>
    <meta property="og:image"
          content="{{ $event->commondata->flier_url }}"/>
@endsection
@section('body_content')

    <br>
    <br>
    <script !src="">
        $(document).on('click', '.tag', function () {
            $("#search_box").val($(this).text());
            $("#search_box").submit();
            $("#search_box").val("");
        });
    </script>

    <div class="center wow fadeInDown">
        <div class="blog container">
            <div class="blog-item">

                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <img class="img-responsive img-blog"
                             src="{{ $event->commondata->flier_url }}"
                             alt="Flier" style="margin: 0 auto;"/>
                    </div>
                    <div class="col-sx-12 col-sm-6">
                        <table class="table table-responsive table-striped table-hover col-sm-12">
                            <tr>
                                <td colspan="2"><strong>General Information</strong></td>
                            </tr>
                            <tr>
                                <td class="col-sm-4" style="text-align: left">Name</td>
                                <td class="col-sm-8" style="text-align: left">{{ $event->name }}</td>
                            </tr>
                            <tr>
                                <td class="col-sm-4" style="text-align: left">Organizer</td>
                                <td class="col-sm-8"
                                    style="text-align: left">{{ $event->event_info->organizer }}</td>
                            </tr>
                            <tr>
                                <td class="col-sm-4" style="text-align: left">Venue</td>
                                <td class="col-sm-8" style="text-align: left">{{ $event->event_info->venue }}</td>
                            </tr>
                            <tr>
                                <td class="col-sm-4" style="text-align: left">Registration deadline</td>
                                <td class="col-sm-8"
                                    style="text-align: left">{{ $event->event_info->reg_deadline }}</td>
                            </tr>
                            <tr>
                                <td class="col-sm-4" style="text-align: left">Event date</td>
                                <td class="col-sm-8"
                                    style="text-align: left">{{ $event->event_info->event_date }}</td>
                            </tr>
                            <tr>
                                <td class="col-sm-4" style="text-align: left">Description</td>
                                <td class="col-sm-8"
                                    style="text-align: left">{{ $event->event_info->description }}</td>
                            </tr>
                            @if($type == 1)
                                <tr>
                                    <td colspan="2"><strong>Hackathon Information</strong></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-4" style="text-align: left">Participant info</td>
                                    <td class="col-sm-8"
                                        style="text-align: left">{{ $event->hackathon->participant_info }}</td>
                                </tr>
                                <tr>
                                    <td class="col-sm-4" style="text-align: left">Reward</td>
                                    <td class="col-sm-8"
                                        style="text-align: left">{{ $event->hackathon->reward }}</td>
                                </tr>
                                <tr>
                                    <td class="col-sm-4" style="text-align: left">Duration</td>
                                    <td class="col-sm-8"
                                        style="text-align: left">{{ $event->hackathon->duration }}</td>
                                </tr>
                                <tr>
                                    <td class="col-sm-4" style="text-align: left">No of teams selected</td>
                                    <td class="col-sm-8"
                                        style="text-align: left">{{ $event->hackathon->team_count }}</td>
                                </tr>
                                <tr>
                                    <td class="col-sm-4" style="text-align: left">Maximum number of members per
                                        team
                                    </td>
                                    <td class="col-sm-8"
                                        style="text-align: left">{{ $event->hackathon->max_per_team_no }}</td>
                                </tr>
                                <tr>
                                    <td class="col-sm-4" style="text-align: left">Minimum number of members per
                                        team
                                    </td>
                                    <td class="col-sm-8"
                                        style="text-align: left">{{ $event->hackathon->min_per_team_no }}</td>
                                </tr>
                            @elseif($type==2)
                                <tr>
                                    <td colspan="2"><strong>Meetup Information</strong></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-4" style="text-align: left">Participant info</td>
                                    <td class="col-sm-8"
                                        style="text-align: left">{{ $event->meetup->participant_info }}</td>
                                </tr>
                                <tr>
                                    <td class="col-sm-4" style="text-align: left">Duration</td>
                                    <td class="col-sm-8"
                                        style="text-align: left">{{ $event->meetup->duration }}</td>
                                </tr>
                                <tr>
                                    <td class="col-sm-4" style="text-align: left">Headcount</td>
                                    <td class="col-sm-8"
                                        style="text-align: left">{{ $event->meetup->head_count }}</td>
                                </tr>
                            @elseif($type==3)
                                <tr>
                                    <td colspan="2"><strong>Event Information</strong></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-4" style="text-align: left">Participant info</td>
                                    <td class="col-sm-8"
                                        style="text-align: left">{{ $event->otherevent->participant_info }}</td>
                                </tr>
                                <tr>
                                    <td class="col-sm-4" style="text-align: left">Duration</td>
                                    <td class="col-sm-8"
                                        style="text-align: left">{{ $event->otherevent->duration }}</td>
                                </tr>
                                <tr>
                                    <td class="col-sm-4" style="text-align: left">Headcount</td>
                                    <td class="col-sm-8"
                                        style="text-align: left">{{ $event->otherevent->head_count }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td colspan="2"><strong>Additional Information</strong></td>
                            </tr>
                            <tr>
                                <td class="col-sm-4" style="text-align: left">Website</td>
                                <td class="col-sm-8" style="text-align: left"><a
                                            href="{{ $event->commondata->url }}"
                                            target="_blank">{{ $event->commondata->url }}</a></td>
                            </tr>
                            <tr>
                                <td class="col-sm-4" style="text-align: left">Registration form</td>
                                <td class="col-sm-8" style="text-align: left"><a
                                            href="{{ $event->commondata->google_form }}"
                                            target="_blank">{{ substr($event->commondata->google_form,0,35).'...' }}</a>
                                </td>
                            </tr>

                        </table>
                        <div class="post-tags">
                            <strong>Tags:</strong>
                            @foreach($event->tags as $tag )
                                &nbsp; <a href="javascript:void(0)" class="tag" data-toggle="tooltip"
                                          title="Click to view similar events">{{ $tag->tag }}</a>
                                &nbsp; &nbsp;
                            @endforeach
                        </div>
                    </div>
                </div>
                <br>
                {{--<link href="/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />--}}
                {{--<label for="input-7-xs" class="control-label">Extra Small Rating</label>--}}
                {{--<input id="input-7-xs" class="rating rating-loading" value="1" data-min="0" data-max="5" data-step="0.5" data-size="xs"><hr/>--}}
                <hr>
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div id="disqus_thread"></div>
                        <script>
                            /**
                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
                             */
                            var disqus_config = function () {
                                this.page.url = "";  // Replace PAGE_URL with your page's canonical URL variable
                                this.page.identifier = "{{ $event->commondata->comment_id }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };
                            (function () {  // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');

                                s.src = '//hackoverflow.disqus.com/embed.js';

                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
