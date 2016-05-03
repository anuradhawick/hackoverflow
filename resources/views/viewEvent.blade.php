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
@section('body_content')
    <br>
    <br>
    <div class="center wow fadeInDown">
        <div class="blog container">
            <div class="blog-item">

                <div class="row">
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
                                <a href="javascript:void(0)"> &nbsp; {{ $tag->tag }} &nbsp; &nbsp;</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <img class="img-responsive img-blog"
                             src="{{ $event->commondata->flier_url }}"
                             alt="Flier" style="margin: 0 auto;"/>
                    </div>
                </div>
                <br>
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

                                s.src = '//binarymathematics.disqus.com/embed.js';

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
